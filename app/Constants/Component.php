<?php

namespace App\Constants;

class Component
{
    const LIST = [
        'home' => [
            'name' => 'Home',
            'component' => 'HomeView',
            'content_type' => 'text',
            'active' => false,
        ],
        'text' => [
            'name' => 'Text',
            'component' => 'Text',
            'content_type' => 'text',
            'active' => true,
        ],
        'text-input' => [
            'name' => 'Text Input',
            'component' => 'TextInput',
            'content_type' => 'text',
            'active' => true,
        ],
        'picture' => [
            'name' => 'Picture',
            'component' => 'ImageInput',
            'content_type' => 'img',
            'active' => true,
        ],
        'audio-recorder' => [
            'name' => 'AudioRecorder',
            'component' => 'AudioRecording',
            'content_type' => 'text',
            'active' => true,
        ],
        'result' => [
            'name' => 'Result',
            'component' => 'SubmitResult',
            'content_type' => 'text',
            'active' => false,
        ],
    ];
}
