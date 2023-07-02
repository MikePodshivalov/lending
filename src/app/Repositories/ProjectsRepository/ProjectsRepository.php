<?php

namespace App\Repositories\ProjectsRepository;

/**
 * Реализация интерфейса репозитория для работы с проектами
 */
class ProjectsRepository implements ProjectsRepositoryInterface
{
//    /**
//     * @inheritDoc
//     */
//    public function getApiAuthorizationByEmail(string $email): ?ApiAuthorization
//    {
//        /** @var ApiAuthorization|null $apiAuthorization */
//        $apiAuthorization = ApiAuthorization::query()->where('login', $email)->first();
//
//        return $apiAuthorization;
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function makeResetPasswordForApiAuthorization(ApiAuthorization $apiAuthorization): ResetPassword
//    {
//        $resetPassword = new ResetPassword();
//        $resetPassword->apiAuthorization()->associate($apiAuthorization);
//        $resetPassword->save();
//
//        return $resetPassword->refresh();
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function getResetPasswordByID(string $resetPasswordID): ?ResetPassword
//    {
//        /** @var ResetPassword|null $resetPassword */
//        $resetPassword = ResetPassword::with('apiAuthorization')->find($resetPasswordID);
//
//        return $resetPassword;
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function deleteResetPasswordByID(string $resetPasswordID): void
//    {
//        $resetPassword = $this->getResetPasswordByID($resetPasswordID);
//        if (!$resetPassword) {
//            return;
//        }
//
//        $resetPassword->delete();
//    }
}
