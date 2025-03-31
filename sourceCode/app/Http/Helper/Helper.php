<?php
use App\Models\Setting;
use App\Models\ThemeSetting;

if(! function_exists('currencyFormat')) {
    function currencyFormat($currency)
    {
        return Setting::get('currency_code').number_format($currency, 2);
    }
}

/**
 * Get domain (host without sub-domain)
 *
 * @param null $url
 * @return string
 */
function getDomain($url = null)
{
    if (!empty($url)) {
        $host = parse_url($url, PHP_URL_HOST);
    } else {
        $host = getHost();
    }

    $tmp = explode('.', $host);
    if (count($tmp) > 2) {
        $itemsToKeep = count($tmp) - 2;
        $tlds = config('tlds');
        if (isset($tmp[$itemsToKeep]) && isset($tlds[$tmp[$itemsToKeep]])) {
            $itemsToKeep = $itemsToKeep - 1;
        }
        for ($i = 0; $i < $itemsToKeep; $i++) {
            \Illuminate\Support\Arr::forget($tmp, $i);
        }
        $domain = implode('.', $tmp);
    } else {
        $domain = @implode('.', $tmp);
    }

    return $domain;
}

/**
 * Get host (domain with sub-domain)
 *
 * @param null $url
 * @return array|mixed|string
 */
function getHost($url = null)
{
    if (!empty($url)) {
        $host = parse_url($url, PHP_URL_HOST);
    } else {
        $host = (trim(request()->server('HTTP_HOST')) != '') ? request()->server('HTTP_HOST') : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');
    }

    if ($host == '') {
        $host = parse_url(url()->current(), PHP_URL_HOST);
    }

    return $host;
}

function isValidJson($string)
{
    try {
        json_decode($string);
    } catch (\Exception $e) {
        return false;
    }

    return (json_last_error() == JSON_ERROR_NONE);
}

if (!function_exists('add_button')) {
    function add_button($route, $permission = null, $label = null,$langFile = null, $bgColor = 'btn-primary')
    {
        if (auth()->user()->can($permission)) {
            return  '<a href="' . $route . '" class="db-btn h-[37px] text-white bg-primary">
            <i class="fa-solid fa-circle-plus"></i>
             <span>' . trans($langFile.'.' . $label . '') . '</span>
             </a>';
        }
        return '';
    }
}
if (!function_exists('view_button')) {
    function view_button($route, $permission = null)
    {
        if (auth()->user()->can($permission)) {
            return '<a href="' . $route . '" class="db-table-action view modal-btn">
                <i class="fa-solid fa-eye"></i>
                <span class="db-tooltip">view</span>
                </a>';
        }
        return '';
    }
}
if (!function_exists('edit_button')) {
    function edit_button($route, $permission = null)
    {
        if (auth()->user()->can($permission)) {
            return '<a href="' . $route . '" class="db-table-action edit modal-btn">
                      <i class="fa-solid fa-pencil"></i>
                      <span class="db-tooltip">edit</span>
                    </a>';
        }
        return '';
    }
}
if (!function_exists('delete_button')) {
    function delete_button($route, $permission)
    {
        if (auth()->user()->can($permission)) {
            return '<form class="inline-block" action="' . $route . '" method="POST">' . method_field('DELETE') . csrf_field() .
                '<button class="db-table-action delete modal-btn"> <i class="fa-solid fa-trash-can"></i> <span class="db-tooltip">delete</span></button></form>';
        }
    }
}

if (!function_exists('visitor_checkout_button')) {
    function visitor_checkout_button($route, $permission = null)
    {
        if (auth()->user()->can($permission)) {
            return '<a href="' . $route . '" class="db-table-action edit modal-btn">
                      <i class="fa-solid fa-circle-check"></i>
                      <span class="db-tooltip">Checkout</span>
                    </a>';
        }
        return '';
    }
}
if (!function_exists('permission_button')) {
    function permission_button($route, $permission = null)
    {
        if (auth()->user()->can($permission)) {
            return '<a href="' . $route . '" class="db-table-action view modal-btn">
                      <i class="fas fa-plus"></i>
                      <span class="db-tooltip">permission</span>
                    </a>';
        }
        return '';
    }
}
if (!function_exists('visitor_disable_button')) {
    function visitor_disable_button($route, $permission = null)
    {
        if (auth()->user()->can($permission)) {
            return '<a href="' . $route . '" class="db-table-action delete modal-btn">
                      <i class="fa-solid fa-triangle-exclamation"></i>
                      <span class="db-tooltip">Block</span>
                    </a>';
        }
        return '';
    }
}
if (!function_exists('visitor_unblock_button')) {
    function visitor_unblock_button($route, $permission = null)
    {
        if (auth()->user()->can($permission)) {
            return '<a href="' . $route . '" class="db-table-action delete modal-btn">
                      <i class="fa-solid fa-circle-check"></i>
                      <span class="db-tooltip">Unblock</span>
                    </a>';
        }
        return '';
    }
}
if (!function_exists('action_button')) {
    function action_button($array)
    {
        if (isset($array['view']['permission']) || isset($array['edit']['permission']) || isset($array['delete']['permission'])) {
            $retAction = '';
            if (isset($array['visitor_checkout']['route'])) {
                $retAction .= visitor_checkout_button($array['visitor_checkout']['route'], $array['visitor_checkout']['permission']);
            }
            if (isset($array['visitor_disable']['route'])) {
                $retAction .= visitor_disable_button($array['visitor_disable']['route'], $array['visitor_disable']['permission']);
            }
            if (isset($array['visitor_unblock']['route'])) {
                $retAction .= visitor_unblock_button($array['visitor_unblock']['route'], $array['visitor_unblock']['permission']);
            }
            if (isset($array['permission']['route'])) {
                $retAction .= permission_button($array['permission']['route'], $array['permission']['permission']);
            }
            if (isset($array['view']['route'])) {
                $retAction .= view_button($array['view']['route'], $array['view']['permission']);
            }
            if (isset($array['edit']['route'])) {
                $retAction .= edit_button($array['edit']['route'], $array['edit']['permission']);
            }
            if (isset($array['delete']['route'])) {
                $retAction .= delete_button($array['delete']['route'], $array['delete']['permission']);
            }
            return $retAction;
        }
        return '';
    }

    if (!function_exists('date_time_format')) {
        function date_time_format($date)
        {
            return \Carbon\Carbon::parse($date)->format('d M Y h:i A');
        }
    }
    if (!function_exists('custome_date_format')) {
        function custome_date_format($date)
        {
            return \Carbon\Carbon::parse($date)->format('d M Y');
        }
    }
    if (!function_exists('time_format')) {
        function time_format($time)
        {
           return  date('h:i A', strtotime($time));
        }
    }

    if (!function_exists('getGreeting')) {
        function getGreeting()
        {
            $currentHour = now()->format('H');

            if ($currentHour >= 5 && $currentHour < 12) {
                return 'Good Morning!';
            } elseif ($currentHour >= 12 && $currentHour < 17) {
                return 'Good Afternoon!';
            } elseif ($currentHour >= 17 && $currentHour < 21) {
                return 'Good Evening!';
            } else {
                return 'Good Night!';
            }
        }
    }

    if (!function_exists('domain')) {
        function domain($input)
        {
            $input = trim($input, '/');
            if (!preg_match('#^http(s)?://#', $input)) {
                $input = 'http://' . $input;
            }
            $urlParts = parse_url($input);

            $link = '';
            if (isset($urlParts['port'])) {
                $link .= ':' . $urlParts['port'];
            }

            if (isset($urlParts['path'])) {
                $link .= $urlParts['path'];
            }

            return preg_replace('/^www\./', '', ($urlParts['host'] . $link));
        }
    }

    if (!function_exists('themeSetting')) {
        function themeSetting($key)
        {
            return ThemeSetting::where(['key' => $key])->first();
        }
    }


}
