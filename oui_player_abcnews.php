<?php

/*
 * This file is part of oui_player,
 * an extendable plugin to easily embed
 * customizable players in Textpattern CMS.
 *
 * https://github.com/NicolasGraph/oui_player
 *
 * Copyright (C) 2016-2017 Nicolas Morand
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT
 * OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

/**
 * Abcnews
 *
 * @package Oui\Player
 */

namespace Oui\Player {

    if (class_exists('Oui\Player\Provider')) {

        class Abcnews extends Provider
        {
            protected static $patterns = array(
                'video' => array(
                    'scheme' => '#^(http|https)://(abcnews\.go\.com/([a-zA-Z]+/)?video)/[^0-9]+([0-9]+)$#i',
                    'id'     => '4',
                ),
            );
            protected static $src = '//abcnews.go.com/';
            protected static $glue = array('video/embed?id=', '&amp;', '&amp;');
        }
    }
}

namespace {
    function oui_abcnews($atts) {
        return oui_player(array_merge(array('provider' => 'abcnews'), $atts));
    }

    function oui_if_abcnews($atts, $thing) {
        return oui_if_player(array_merge(array('provider' => 'abcnews'), $atts), $thing);
    }
}
