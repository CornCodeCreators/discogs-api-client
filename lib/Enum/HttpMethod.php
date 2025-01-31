<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Enum;

enum HttpMethod: string
{
    case GET    = 'GET';
    case PUT    = 'PUT';
    case POST   = 'POST';
    case DELETE = 'DELETE';
}
