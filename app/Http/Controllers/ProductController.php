<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia; //ใช้ของ inertia
use Inertia\Response;


class ProductController extends Controller
{

    private $products = [
        [
            'id' => 1,
            'name' => 'Nike SB Alleyoop',
            'description' => 'Nike SB Alleyoop มาในซิลลูเอทไม่หุ้มข้อ ให้ความสบายยาวนาน มีหนังกลับนุ่มและโฟมนุ่มพิเศษที่โอบรับและรองรับเท้าคุณได้อย่างยาวนานแม้ใกล้หมดวัน',
            'price' => 1250,
            'imageSRC' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/1a89e733-831f-4e9a-a7a4-2570f098113f/NIKE+SB+ALLEYOOP.png'
        ],
        [
            'id' => 2,
            'name' => 'Nike Cross Trainer Low',
            'description' => 'Nike Cross Trainer Low โดดเด่นด้วยลายเส้นสะอาดตาในแบบของรุ่น OG มีชั้นบุหนานุ่มที่ข้อเท้า และใช้ดีไซน์แบบยุค 90 ตอนต้นที่ดูไม่หนาและไม่บางจนเกินไป ถ้าคุณทำทุกอย่างได้แล้ว รองเท้าที่ใส่ก็ต้องทำได้ด้วย รุ่นนี้แหละจึงตอบโจทย์',
            'price' => 1550,
            'imageSRC' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/980711af-149f-461a-bcf0-569d6a876fe7/NIKE+CROSS+TRAINER+LOW.png'
        ],
        [
            'id' => 3,
            'name' => 'Nike Air Max Correlate',
            'description' => 'Air Max Correlate นำดีไซน์ย้อนยุคมาปรับโฉมใหม่ให้ทันสมัย การผสมผสานวัสดุที่หลากหลายสะท้อนถึงสไตล์ต้นยุค 90 ขณะที่ระบบลดแรงกระแทก Max Air เพิ่มความสบายที่ยาวนาน',
            'price' => 1650,
            'imageSRC' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/i1-d636b0ce-26ef-4e36-b0d3-0420514d16d9/NIKE+AIR+MAX+CORRELATE.png'
        ],
        [
            'id' => 4,
            'name' => 'Nike Air Max Command',
            'description' => 'Nike Air Max Command เสริมการทรงตัวพร้อมลดแรงกระแทกได้ดี ส่วนผสมระหว่างหนัง ผ้า และวัสดุสังเคราะห์ที่ส่วนบนให้ความสบาย ขณะที่พื้นรองเท้าชั้นนอกลายวาฟเฟิลให้การยึดเกาะอย่างทนทานบนหลายพื้นผิว',
            'price' => 2000,
            'imageSRC' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/cc47ba32-5371-449c-aaae-a725298944d6/AIR+MAX+COMMAND.png'
        ],
        [
            'id' => 5,
            'name' => 'Nike Cortez Leather',
            'description' => 'ความคิดเห็นของคุณ เรารับฟังไว้แล้ว เราได้ปรับโฉม Cortez ออริจินัลตามข้อเสนอแนะของคุณ ในขณะเดียวกันก็ยังคงรูปลักษณ์เรโทรที่คุณรู้จักและชื่นชอบเอาไว้ รุ่นนี้มาพร้อมส่วนปลายเท้าที่กว้างขึ้นและแผงด้านข้างที่แข็งแรงขึ้นเพื่อให้สวมใส่สบายในทุกๆ วันโดยที่ตัววัสดุไม่บิดงอ คู่นี้แหละที่ใช่สำหรับแฟน Cortez เช่นคุณ',
            'price' => 1700,
            'imageSRC' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/3f6f52e9-f18a-4eb2-8788-61bc06f08a5a/NIKE+CORTEZ.png'
        ],
        [
            'id' => 6,
            'name' => 'Nike Ebernon Low Premium',
            'description' => 'Ebernon นำรูปลักษณ์และสัมผัสของสไตล์บาสเก็ตบอลยุค 80 กลับมาอีกครั้ง คู่นี้โดดเด่นด้วยซิลลูเอทล้ำสมัยที่ให้การยึดเกาะทนทาน ส่วนหุ้มชั้นนอกแบบเย็บสะท้อนถึงดีไซน์ของต้นฉบับรองเท้าบาสสไตล์เรโทรเพื่อสไตล์บนคอร์ทที่ไม่มีตกยุค',
            'price' => 1300,
            'imageSRC' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0c52e458-db14-4505-90ab-2be5797a35c8/NIKE+EBERNON+LOW+PREM.png'
        ],
        [
            'id' => 7,
            'name' => 'Nike Air Force 1 07',
            'description' => 'สบาย ทนทาน และเป็นอมตะ นี่คือเหตุผลที่ทำให้คู่นี้เป็นอันดับ 1 โครงสร้างจากยุค 80 จับคู่กับสีสันคลาสสิกเพื่อนำเสนอสไตล์ที่ดูดีไม่มีแผ่วไม่ว่าจะอยู่ในคอร์ทหรืออยู่ที่ไหน',
            'price' => 1660,
            'imageSRC' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/87d466f5-d55b-43b1-ae83-b040e3ee306c/AIR+FORCE+1+%2707.png'
        ],
        [
            'id' => 8,
            'name' => 'Nike Dunk Low Retro LTD',
            'description' => 'Dunk Low คู่นี้นำวัฒนธรรมการสักมาใช้เพิ่มความสร้างสรรค์ของไอคอนสตรีทแวร์ สีคัลเลอร์บล็อคสะดุดตาผลิตด้วยหนังเรียบลื่นทำให้ได้ผืนผ้าใบที่ลงตัวเหมาะกับการเย็บลายใยแมงมุมที่ปลายเท้า อาร์ตเวิร์คที่ได้แรงบันดาลใจจากรอยสักแบบดั้งเดิมบนป้ายลิ้นรองเท้าด้านในและพื้นรองเท้าชั้นในช่วยเติมเต็มดีไซน์การสัก ไม่จำเป็นต้องปกปิดเลย',
            'price' => 1899,
            'imageSRC' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/78d04c49-7f82-4077-89f1-38f7fa478ff5/NIKE+DUNK+LOW+RETRO+LTD.png'
        ],

    ];


    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);
        //ส่งข้อมูลรายการสินค้า $this->products ไปในรูปแบบ key-value pair
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $product = collect($this->products)->firstWhere('id', $id);

        if (!$product) {
            abort(404, 'Product not found');
        }
        return Inertia::render('Products/Show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
