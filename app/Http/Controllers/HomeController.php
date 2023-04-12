<?php

namespace App\Http\Controllers;

use App\Models\BasicResearch;
use App\Models\BasicResearchLecturer;
use App\Models\StudentResearch;
use App\Models\Theses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $arr = [
            "Một giấc mơ không được thực hiện hóa thông qua phép thuật mà cần mồ hôi, sự quyết tâm và chăm chỉ.",
            "Không người thành công nào, ngay cả những người làm cho nó có vẻ dễ dàng, lại không làm việc chăm chỉ.",
            "Cách để bắt đầu là ngừng nói và bắt đầu hành động.",
            "Tất cả sự tăng trưởng đều phụ thuộc vào hoạt động<br>Không có sự phát triển về thể chất hay trí tuệ nếu không có ",
            "Không có lối tắt dẫn đến bất kỳ nơi nào đáng đến.",
            "Nơi duy nhất mà thành công đến trước<br> khi làm việc chỉ xuất hiện trong từ điển.",
            "Chúng tôi hiện thân cho những việc <br>chúng tôi thực hiện lặp đi lặp lại. Xuất sắc không phải<br> là một hành động mà là một thói quen.",
            "Một con thuyền sẽ không tiến về phía <br>trước nếu mỗi người chèo theo cách riêng của họ.",
            "Nếu bạn không thể bay, thì hãy chạy<br> nếu bạn không thể chạy, hãy đi bộ; <br>nếu bạn không thể đi, hãy bò, nhưng dù bạn làm gì, <br>bạn phải tiếp tục tiến về phía trước.",
            "Chúng ta có thể gặp nhiều thất bại<br> nhưng chúng ta không được bị đánh bại.",
            "Nếu bạn đang làm việc gì đó mà bạn thực sự quan tâm<br>bạn không cần phải bị thúc ép.<br>Tầm nhìn sẽ kéo bạn bước tiếp.",
            "Nếu ước mơ của bạn là một ước mơ lớn <br>và nếu bạn muốn cuộc sống của mình đạt được mức độ cao như bạn nói, <br>thì không có cách nào khác ngoài thực hiện công việc <br>cần thiết để đưa bạn đến đó.",
            "Những giới hạn chỉ tồn tại trong tâm trí của chúng ta.<br> Nhưng nếu chúng ta sử dụng trí tưởng tượng của mình, khả năng của chúng ta trở nên vô hạn.",
            "Không thể đạt được sự hoàn hảo, nhưng nếu chúng ta theo đuổi sự hoàn hảo, chúng ta có thể bắt được sự xuất sắc.",
            "Sự khác biệt giữa bình thường và phi thường là thêm một chút.",
            "Cách duy nhất để làm được công việc tuyệt vời là yêu thích những gì bạn làm.",
            "Mọi người đều muốn được đánh giá cao<br>vì vậy nếu bạn đánh giá cao ai đó, đừng giữ bí mật.",
            "Đừng cố gắng trở thành một người đàn ông thành công <br>Mà hãy cố gắng trở thành một người đàn ông có giá trị.",
            "Mọi người có thể nhận một công việc để kiếm nhiều tiền<br>Nhưng họ thường rời bỏ nó để được công nhận nhiều hơn.",
            "Luôn nhìn về phía trước và giữ cho đôi chân luôn  vững bước trên con đường<br> Chỉ cần bạn biết nơi mình muốn đến, chắc chắn bạn sẽ  đến được đó.",
            "Cuộc đời chỉ có một, vì thế hãy làm những gì khiến bạn hạnh phúc<br>và ở bên người khiến bạn luôn mỉm cười.",
            "Thách thức là điều làm cho cuộc sống trở nên thú vị<br>và vượt qua thử thách chính là những gì tạo nên ý nghĩa cuộc sống.",
            "Cách duy nhất để biến sự thay đổi thành sự thật chính là <br>liều mạng với nó và tận hưởng thành quả.",
            "Người bi quan luôn thấy khó khăn trong cơ hội, người lạc quan luôn thấy cơ hội trong khó khăn.",
            "Đời ngắn ngủi, khổ là một ngày, sướng cũng là một  ngày<br>Nếu bạn không có năng lực khiến bản thân vui vẻ<br>vậy thì không ai có thể cho bạn cuộc sống hạnh phúc đâu.",
            "Hãy là chính bạn. Làm “người khác” đã có người  khác làm rồi.",
            "Trong cuộc sống, nơi nào có một người chiến thắng,nơi đó có một người thua cuộc<br> Nhưng người biết hi sinh vì người khác luôn luôn là người chiến thắng.",
            "Đừng nghĩ mãi về quá khứ, nó chỉ mang tới những  giọt nước mắt<br>Đừng nghĩ nhiều về tương lai, nó chỉ mang lại lo sợ. <br>Hãy sống ở  hiện tại với nụ cười trên môi như trẻ thơ, nó sẽ mang lại niềm vui cho bạn.",
            "Mọi thứ bạn muốn đang chờ đợi bạn ngoài kia.<br> Mọi  thứ bạn muốn cũng “muốn” bạn, nhưng bạn phải hành động để có được chúng<br>Vũ trụ muốn bạn thành công.",
            "Cuộc sống luôn cho bạn cơ hội thứ hai, nó được gọi là ngày mai.",
            "Đừng để nỗi âu lo của hôm qua làm phai mờ vẻ đẹp của ngày hôm nay.",
            "Đừng mơ trong cuộc sống, hãy sống vì những giấc mơ.",
            "Nếu bạn không thành công, người khác sẽ thành công",
            "Muốn mua đồ mà không nhìn giá, hãy lao động mà không nhìn đồng hồ.",
            "Chỉ những người dám thất bại lớn mới đạt được thành công lớn.",
            "Bạn không thể để thất bại định hình mình, bạn phải để thất bại dạy mình.",
            "Một giấc mơ sẽ chẳng thể trở thành hiện thực nếu chỉ trông chờ vào phép màu<br>Bạn cần đánh đổi bằng mồ hôi, quyết tâm và sự cố gắng.",
            "Sự kiên trì chính là khác biệt lớn nhất giữa thành công và thất bại.",
            "Thành công không đến với những ai chỉ nỗ lực một vài lần.",
            "Nếu mọi người nghi ngờ bạn có thể đi được bao xa<br>Hãy đi xa đến mức bạn không thể nghe thấy họ nữa.",
            "Chúng ta có thể thất bại nhiều lần nhưng không thể bị đánh bại.",
            "Hãy dám đối mặt và vượt qua những trở ngại<br>Bạn sẽ phát hiện ra chúng không thực sự đáng ngại như bạn nghĩ.",
            "Giữa thành công và thất bại có con sông gian khổ<br>Trên con sông đó có cây cầu tên là sự cố gắng",
        ];

        $quote = $arr[array_rand($arr, 1)];

        //get all khoá
        // khoá = năm hiện tại - 2007 - 3 
        $allSchoolYear = (int)date("Y") - 2007 - 3;
        
        $id = auth()->user()->id;
        $total_thesesAuth = Theses::query()->where('lecturer_id',$id)->count();
        $total_basic_researchAuth = BasicResearchLecturer::query()->where('lecturer_id',$id)->count();
        $total_student_researchAuth = StudentResearch::query()->where('lecturer_id',$id)->count();
        
        // dd($this->getAllRecordEachTable());
        
        return view('home.index', [
            'tittlePage' => '- Trang Chủ',
            'quote' => $quote,
            'allSchoolYear' => $allSchoolYear,
            'totalEachTable' => $this->getAllRecordEachTable(),
            'total_thesesAuth' => $total_thesesAuth,
            'total_student_researchAuth' => $total_student_researchAuth,
            'total_basic_researchAuth' => $total_basic_researchAuth,
        ]);
    }
    public function getAllRecordEachTable()
    {
        $data = DB::table('INFORMATION_SCHEMA.TABLES')
            ->select('TABLE_NAME', DB::raw("SUM(TABLE_ROWS) as total_record"))
            ->where('TABLE_SCHEMA', '=', 'dbluanvan')
            ->groupBy('TABLE_NAME')
            ->get();
    
            // dd($data);
        return $data;
    }
}
