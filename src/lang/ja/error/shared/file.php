<?php

use App\Actions\Shared\FileErrorCode;

return [
    FileErrorCode::FileNotExists->value => '対象のファイルが存在しませんでした。',

    FileErrorCode::FailedToGetFileSize->value => 'ファイルサイズが不明です。',

    FileErrorCode::FailedToUploadFileToStorage->value => 'ファイルのアップロードに失敗しました。',

    FileErrorCode::RemoveFileFailed->value => 'ファイルの削除に失敗しました。',
];
