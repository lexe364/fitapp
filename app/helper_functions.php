<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Session\Session;
use TrueBV\Punycode;

if (!function_exists('transaction')) {
    function transaction(callable $callback, int $attempts = 1): mixed
    {
        if (DB::transactionLevel() > 0) {
            return $callback();
        }

        return DB::transaction($callback, $attempts);
    }
}
if (!function_exists('active_link')) {
    function active_link_class(string|array $names, string $class = 'active'): string|null    {
        if (is_string($names)) {
            $names = [$names];
        }

        return Route::is($names) ? $class : null;
    }
}
if ( !function_exists('error')) {

    function error(string $msg) {
        abort(403,$msg);
        return die($msg);
    }
}
if ( !function_exists('telegram_bot_send_message')) {

    function telegram_bot_send_message(string $msg) {
        return (new  \App\Services\TelegramBotService)->sendMessage($msg);;
    }
}
if ( !function_exists('u')) {
    function u(string $name, string $active = 'active'): string {
        return app('Updater');
    }
}
if ( !function_exists('get_instanns')) {
    /**
     * @template TClass
     * @param class-string<TClass> $class_name
     * @return TClass
     */
    function get_instanns($class_name, array $parameters = []) {
        return app()->make($class_name, $parameters);
    }
}
if ( !function_exists('first_char')) {
    function first_char(string $str) :string {
        return Str::of($str)->charAt(0);
    }
}
if ( !function_exists('last_char')) {
    function last_char(string $str) :string {
        return substr($str, -1);
    }
}
if ( !function_exists('get_ext')) {
    function get_ext(string $str) :string {
        return pathinfo(storage_path($str), PATHINFO_EXTENSION);
    }
}
if ( !function_exists('DB_start_query_log')) {
    function DB_start_query_log() :void {
        DB::enableQueryLog();
    }
    function DB_get_query_log()  {
        return DB::getQueryLog();
    }
}
if ( !function_exists('admin')) { /**
 * @template U
 *  магия чтобы IDE видела методы модели
 * @return \App\Models\Admin\Account<U
 */
    function admin() {
        return \auth('admin')->user();
    }
}
if ( !function_exists('get_route_from_classname')) {
    function get_route_from_classname($classname) {
        return Str::of(class_basename($classname))->snake()->before('_controller');
    }
}
if ( !function_exists('d')) {
    function d($var) {
         dump($var);
    }
}

if ( !function_exists('trim_repeat_spaces')) {
    function trim_repeat_spaces(string $originalString): string {
        return preg_replace('/\s+/', ' ', $originalString);
    }
}
if ( !function_exists('exec_command')) {
    function exec_command(string $command = 'ls',$is_echo = false){
        $output = []; 		$return_var = NULL;
        exec($command, $output, $return_var);
        if($is_echo){
            echo "Команда: " . $command."\n";
            d($output,"Результат выполнения команды: ");
            echo "Код завершения команды: " . $return_var."\n";
            //							die();
            //			sleep(1);
        }
        return [$output,$return_var];
    }
}
if ( !function_exists('alert')) {
    function alert(string $text, string|null $class=null  ) {
        $alert_array = session()->pull('alert_array', []);

        $alert_array [] = ['message' => $text, 'class' => $class??'info'];
        return session(['alert_array' => $alert_array]);
    }
}
if ( !function_exists('sort_url')) {
    function sort_url(array $params  ) {
        return request()->fullUrlWithQuery(array_merge($params,['direction'=>request()->get('direction')=='DESC'?'ASC':'DESC']));
    }
}

if ( !function_exists('sort_icon_class')) {
    function sort_icon_class( ) {
        return (request()->get('direction')=='DESC'?'bx bx-sort-down':'bx bx-sort-up');
    }
}

if ( !function_exists('isset_count')) {
    function isset_count($var = NULL) {
        return (isset($var) and (is_array($var) or is_countable($var)) and count($var));
    }
}
if ( !function_exists('roundsize')) {
    //вывети размер окгргленным
    function roundsize($size, $precision = 2) {
        if ( $size > 0 ) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' байт', ' Кб', ' Мб', ' Гб', ' Тб');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }

        return $size;
    }
}
if ( !function_exists('str_rand')) {
    function str_rand() {
        return Str::random();
    }
}

if (!function_exists('folder_size')){
    function folder_size($set_dir)
    {
        if(!is_dir($set_dir)){
            return false;
        }
        $set_total_size = 0;
        $set_count = 0;
        $set_dir_array = scandir($set_dir);
        foreach($set_dir_array as $key=>$set_filename)
        {
            if($set_filename!=".." && $set_filename!=".")
            {
                if(is_dir($set_dir."/".$set_filename))
                {
                    $new_foldersize = folder_size($set_dir."/".$set_filename);
                    $set_total_size = $set_total_size+ $new_foldersize;
                }
                else if(is_file($set_dir."/".$set_filename))
                {
                    $set_total_size = $set_total_size + filesize($set_dir."/".$set_filename);
                    $set_count++;
                }
            }
        }
        return $set_total_size;
    }
}
if (!function_exists('diff_microtime')) {
    function diff_microtime( $start_time): mixed
    {
        $diff =microtime(true) -  $start_time;
        return round($diff,2).' сек';
    }
}
if (!function_exists('date_month')) {
    function date_month(string|int|null $date,$format = 'Y-m-d H:i:s'): mixed    {
        if(null === $date){
            return null;
        }
        if(!isset($date) ){
            $date = time();
        }
        if(!is_numeric($date)){
            $date = strtotime($date);
        }
        return date($format,$date);
    }
}

if (!function_exists('punycode')) {
    function punycode(string $str,$decode =false): string   {
        $Punycode = new Punycode();
        if($decode) {
            $decode_str =$Punycode->decode($str);
            return $decode_str ==$str?$str:$decode_str;
            // outputs: xn--renangonalves-pgb.com
        }
        return $Punycode->encode($str);

    }
}


if (!function_exists('nf')) {
    function nf(string $str, int $decimals = 0 , ?string $decimal_separator = '.' , ?string $thousands_separator = ' '): string    {
        return number_format($str,$decimals,$decimal_separator,$thousands_separator);
    }
}

if (!function_exists('redirect_errors')) {
    function redirect_errors(array $array = null)   {
        return redirect()->back()->withErrors($array);
    }
}

if (!function_exists('object_has_trait')) {
    function object_has_trait(object $object,string|className $string):bool {
        return in_array($string, class_uses($object), true);
    }
}
