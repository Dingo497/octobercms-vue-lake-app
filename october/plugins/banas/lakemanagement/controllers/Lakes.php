<?php namespace Banas\LakeManagement\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Banas\LakeManagement\Models\Lake;

/**
 * Lakes Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Lakes extends Controller
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
    public $requiredPermissions = ['banas.lakemanagement.lakes'];


    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Banas.LakeManagement', 'lakemanagement', 'lakes');
    }


    /**
     * Display a list of lakes
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

        $query = Lake::query();
        
        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $query->orderBy($sortColumn, $sortDirection);

        $lakes = $query->paginate($perPage);

        foreach ($lakes as $key => $lake) {
            $lakes[$key]->image = $lake->image ? asset('storage/app/media' . $lake->image) : null;
        }

        return response()->json($lakes);
    }
}
