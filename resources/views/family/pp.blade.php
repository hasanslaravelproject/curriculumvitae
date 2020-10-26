how many column?
4


use Illuminate\Http\Request;

class FamilyInfoController extends Controller
{

public function index()
{
$Std = Student::all();
$abcs = FamilyInfo::all();
return view('family.index', <K></K>K compact('abcs','Std'))    ;



AKKD












