<?php
namespace Northplay\NorthplayApi\Models;
use \Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class LogModel extends Eloquent  {
    protected $table = 'northplay_logs';
    protected $timestamp = true;
    protected $primaryKey = 'id';
    protected $fillable = [
        'type',
        'uuid',
    ];
    protected $casts = [
        'data' => 'json',
        'extra_data' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public static function log_count() {
        $value = Cache::remember('logmodel:log_count', 60, function () {
            return LogModel::count();
        });
        return $value;
    }
    public static function auto_clean()
    {
        LogModel::truncate();
        Cache::pull('datalogger:log_count');
        Log::notice('Truncated datalogger collection automatic because surpassed 5000 entries.');
    }

    public static function save_log($type, $data, $extra_data = NULL)
    {
        if(self::log_count() > 5000) {
            self::auto_clean();
            Log::notice('Truncated northplay_logs collection automatic because surpassed 5000 entries.');
        }

        $data ??= [];
        $data = morph_array($data);
        $extra_data ??= [];
        $extra_data = morph_array($extra_data);
        $logger = new LogModel();
        $logger->type = $type;
		$logger->uuid = Str::orderedUuid();
		$logger->data = $data;
        $logger->extra_data = $extra_data;
		$logger->timestamps = true;
		$logger->save();
        Log::debug($type.' - Northplay Log: '.json_encode($data, JSON_PRETTY_PRINT));
    }




}
