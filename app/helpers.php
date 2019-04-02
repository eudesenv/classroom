<?php

function layout()
{

    if(\Auth::guest()){
        return 'layouts.app';
    }else
        return \Auth::user()->role == \App\User::ROLE_ADMIN ?  'layouts.admin' : 'layouts.app';
}
