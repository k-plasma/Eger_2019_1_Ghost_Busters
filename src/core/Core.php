<?php
/**
 * Redirects to a specified uri.
 * @param string $routeToRedirect The uri to redirect to.
*/
function _redirect(string $routeToRedirect)
{
    echo "<script>location.href='$routeToRedirect';</script>";
    exit;
}

/**
 * Returns the reversed route's uri.
 * @param string $routeName The reverse route.
 * @return string The uri of the route.
 */
function _route(string $routeName) : string
{
    global $router;
    return $router->generate($routeName);
}

/**
 * Return the reverse route's absolute url.
 * @param string $routeName The reverse route.
 * @return string The absolute url.
 */
function _absoluteRoute(string $routeName) : string
{
    global $router;
    return $_SERVER['REQUEST_SCHEME'].':/'.'/'.$_SERVER['HTTP_HOST'].route($routeName);
}

/**
 * Calls the specified controller.
 * @param string $controlRoute Format: [controller name].[function to call].
 * @param array $params The parameters that came from the route.
*/
function _control(string $controlRoute, array $params = null)
{
    $controller = explode('.', $controlRoute)[0];
    $function = explode('.', $controlRoute)[1];
    require_once BASEPATH.'/controllers/'.$controller.'.php';
    $controllerClass = explode('/', $controller)[count(explode('/', $controller))-1];
    $class = new $controllerClass($params);
    $class->$function();
}

/**
 * Shows the specified view.
 * @param string $viewName Format: the path relative to the 'resources/views' folder, without file extension.
 * @param array $params The parameters that came from the controller.
 * @return string The name of the requested view.
*/
function _view(string $viewName, array $params = null)
{
    require_once BASEPATH.'/resources/views/'.$viewName.'.php';
    return $viewName;
}

/**
 * Generates a csrf token.
 * @return string The generated csrf token.
*/
function _csrf() : string
{
    $token = md5(uniqid(mt_rand(), true));
    if (!isset($_SESSION['csrf']) || !is_array($_SESSION['csrf']))
        $_SESSION['csrf'] = array();
    while (count($_SESSION['csrf']) > 20)
        array_shift($_SESSION['csrf']);
    array_push($_SESSION['csrf'], $token);
    return $token;
}

/**
 * Generates and echoes a csrf token for forms, with automatic field.
 * @return string The whole csrf field for forms.
*/
function _formCsrf() : string
{
    return '<input type="hidden" id="csrf" name="csrf" value="'.csrf().'">';
}

/**
 * Gives back the translated equivalent of the given text, if it exists, if it does not, it adds the key to the language file.
 * @param string $text The text which's translation should be searched.
 * @return string The translation of the text.
*/
function __(string $text) : string
{
    if (LANG != 'en') {
        if (array_key_exists($text, TTARRAY) && !is_null(TTARRAY[$text])) return TTARRAY[$text];
        global $langPath;
        if (file_exists($langPath)) {
            $array = (array)json_decode(file_get_contents($langPath));
            $array[$text] = null;
            file_put_contents($langPath, json_encode($array));
        }
    }
    return $text;
}

/**
 * Returns the <script> tag for the specified script file.
 * @param string $jsPath The path to the js file relative to the public/js folder.
 * @return string The appropriate <script> tag.
*/
function _js(string $jsPath) : string
{
    return '<script src="/js/'.$jsPath.'.js"></script>';
}

/**
 * Returns the <link> tag for the specified css file.
 * @param string $cssPath The path to the css file relative to the public/css folder.
 * @return string The appropriate <link> tag.
*/
function _css(string $cssPath) : string
{
    return '<link rel="stylesheet" type="text/css" href="/css/'.$cssPath.'.css">';
}