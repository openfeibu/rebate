<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>{!! Theme::getTitle() !!}</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! Theme::asset()->styles() !!}
    {!! Theme::asset()->scripts() !!}
    {!! Theme::asset()->container('layer_mobile')->scripts() !!}
</head>
<body  ontouchstart >
{!! Theme::partial('header') !!}
{!! Theme::content() !!}
{!! Theme::partial('footer') !!}
</body>
</html>