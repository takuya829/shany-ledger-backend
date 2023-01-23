<?php

namespace App\Actions\Auth;

enum AuthErrorCode: string
{
    case SignUpEmailExists = 'SignUpEmailExists';
    case SignInFailed = 'SignInFailed';
    case SendEmailVerificationNotificationUserNotExists = 'SendEmailVerificationNotificationUserNotExists';
    case SendEmailVerificationNotificationEmailVerified = 'SendEmailVerificationNotificationEmailVerified';
    case VerifyEmailUserNotExists = 'VerifyEmailUserNotExists';
    case VerifyEmailEmailVerified = 'VerifyEmailEmailVerified';
}
