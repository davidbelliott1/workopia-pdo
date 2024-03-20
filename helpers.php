<?php

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */

function basePath($path = '')
{
    return __DIR__  . ($path ? DIRECTORY_SEPARATOR . $path : $path);
}

/**
 * Load a view
 *  
 * @param string $name
 * @return void
 */
function loadView($name, $data = [])
{
    $viewPath = basePath("views/{$name}.view.php");
    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name}' not found";
    }
}



/**
 * Load a partial
 * 
 * @param string $name
 * @return void
 */
function loadPartial($name)
{

    $partialPath = basePath("views/partials/{$name}.php");

    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial '{$name}' not found";
    }
}

/**
 * Inspect a variable
 * 
 * @param mixed $var
 * @return void
 */

function inspect($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


/**
 * Inspect a variable and die
 * 
 * @param mixed $var
 * @return void
 */
function inspectAndDie($var)
{
    inspect($var);
    die();
}

/**
 * Format a salary
 * 
 * @param string $salary
 * 
 * @return string formatted salary
 */
function formatSalary($salary)
{
    return '$' . number_format(floatval($salary), 0);
}
