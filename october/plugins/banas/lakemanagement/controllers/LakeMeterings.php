<?php namespace Banas\LakeManagement\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Banas\LakeManagement\Models\LakeMetering;


/**
 * Lake Meterings Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class LakeMeterings extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['banas.lakemanagement.lakemeterings'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Banas.LakeManagement', 'lakemanagement', 'lakemeterings');
    }

    /**
     * Display a list of lakes meterings
     * @param Request $request
     */
    public function ApiIndex(Request $request): JsonResponse {
        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 10);
        $sort = $request->input('sort', 'id,asc');
        $search = $request->input('search', '');

        Paginator::currentPageResolver(function() use ($page) {
            return $page;
        });

        list($sortColumn, $sortDirection) = explode(',', $sort);

        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc';
        }

        $query = LakeMetering::query();
        
        if (!empty($search)) {
            $query->whereHas('lake', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }

        $query->with('lake');

        $query->orderBy($sortColumn, $sortDirection);

        $lakesMeterings = $query->paginate($perPage);

        return response()->json([
            'data' => $lakesMeterings->items(),
            'total' => $lakesMeterings->total()
        ]);
    }
}
