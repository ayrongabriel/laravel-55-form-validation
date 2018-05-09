<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 22/04/18
 * Time: 19:14
 */

function layout(){
    return (\Request::is('admin*')) ? 'layouts.admin' : 'layouts.app';
}