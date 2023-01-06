<?php

if (! function_exists('pulishedOpt')) {
    function pulishedOpt() {
        return [
            '1' => trans('dashboard.publish'),
            '0' => trans('dashboard.save_to_draft')
        ];
    }
}