<?php

namespace App\Constants;

class Component
{
    const LIST = [
        'home' => [
            'name' => 'Home',
            'component' => 'HomeView',
            'active' => false,
        ],
        'text' => [
            'name' => 'Text',
            'component' => 'Text',
            'active' => true,
        ],
        'text-input' => [
            'name' => 'Text Input',
            'component' => 'TextInput',
            'active' => true,
        ],
        'picture' => [
            'name' => 'Picture',
            'component' => 'Picture',
            'active' => true,
        ],
        'audio-recorder' => [
            'name' => 'AudioRecorder',
            'component' => 'AudioRecording',
            'active' => true,
        ],
        'result' => [
            'name' => 'Result',
            'component' => 'SubmitResult',
            'active' => false,
        ],
    ];
}