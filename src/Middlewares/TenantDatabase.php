<?php

namespace Multiplier\Tenant\Middlewares;

use Multiplier\Tenant\TenantManager;
use Closure;

class TenantDatabase
{

    /**
     * @var TenantManager
     */
    protected $tenantManager;


    public function __construct(TenantManager $tenantManager)
    {
        $this->tenantManager = $tenantManager;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($tenantName = $this->tenantManager->getCurrentTenant()) {
            if ($this->tenantManager->reconnectDatabaseUsing($tenantName)) {
                return $next($request);
            }
        }

        abort(404, "Site Not Found");
    }
}
