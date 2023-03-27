<?php

namespace App\Requests\Ledger;

use App\Models\Ledger\Ledger;
use App\Models\User;
use App\Models\Workspace\WorkspaceAccount;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;

class UpdateLedgerRequest
{
    public readonly Ledger $ledger;

    public readonly WorkspaceAccount $workspaceAccount;

    public readonly User $user;

    /**
     * @throws AuthorizationException
     * @throws AuthenticationException
     * @throws ValidationException
     */
    public function __construct(array $params)
    {
        $this->ledger = Ledger::where('workspace_id', isset($params['workspace_id']) && is_string($params['workspace_id']) ? $params['workspace_id'] : null)
            ->findOrFail(isset($params['id']) && is_string($params['id']) ? $params['id'] : null);

        $this->authorize();
        $this->ledger->fill($this->validate($params));
    }

    /**
     * @throws AuthorizationException
     * @throws AuthenticationException
     * @throws ValidationException
     */
    public static function make(array $params): static
    {
        return new static($params);
    }

    /**
     * @throws AuthorizationException
     * @throws AuthenticationException
     */
    private function authorize(): void
    {
        $this->user = \Auth::authenticate();
        $workspaceAccount = $this->ledger->workspace->findAccount($this->user->id);
        \Gate::authorize('update', [Ledger::make(), $this->ledger->workspace, $workspaceAccount]);
        $this->workspaceAccount = $workspaceAccount;
    }

    /**
     * @throws ValidationException
     */
    private function validate(array $params): array
    {
        return validator(
            $params,
            \Arr::except(
                $this->ledger->validationRUles(),
                ['id', 'workspace_id', 'public_status']
            )
        )->validate();
    }
}
