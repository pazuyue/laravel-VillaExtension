<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('chat-room.{userId}', function ($user, $value) {
    // $user    Auth认证通过的用户模型实例
    // $value   频道规则匹配到的 userId 值
    return $user->id == $value; // 可使用任意条件验证此用户是否可监听此频道
});

