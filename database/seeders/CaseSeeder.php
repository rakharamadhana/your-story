<?php

namespace Database\Seeders;

use App\Models\Cases;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Cases::create([
            'name_en' => 'Case 1',
            'name_zh-TW' => '案例一',
            'description_en' => 'Chen is an athlete in a junior high school art competition. Because she is busy with training for the athletes and preparing for the entrance exams, she often stays at school until late. Whenever she comes home, her mother always says, `Why do you always come home so late? Look at you, you`re getting thinner and thinner`. In order not to argue with his mother, Chen went upstairs to his room in silence. When he got back to his room, he found his younger siblings playing hide-and-seek in his room, making the whole room a mess. After taking a shower, he talked to his brother, sister and mother about his recent situation...',
            'description_zh-TW' => '晨晨是一位國中技藝競賽的選手，因為忙於選手的培訓和升學考試的準備，所以常常在學校弄到很晚才回家。每次回到家，媽媽總是唸說：「為什麼每次都這麼晚回家?你看看你都越來越瘦了，我以前讀書都沒有你這樣子這麼誇張。」為了不跟媽媽起爭執，晨晨只好默默的上樓回房間。回到房間後，發現弟弟妹妹在他房間玩捉迷藏，整個房間被弄得很亂。疲憊的晨晨只好無奈的先把房間整理乾淨，洗完澡後再找弟弟、妹妹和媽媽講他最近的狀況…',
            'observes_en' => 'Chen is an athlete in a junior high school art competition. Because she is busy with training for the athletes and preparing for the entrance exams, she often stays at school until late.',
            'observes_zh-TW' => '晨晨是一位國中技藝競賽的選手，因為忙於選手的培訓和升學考試的準備，所以常常在學校弄到很晚才回家。',
            'perceives_en' => 'Every time I come home, my mother always says, Why do you come home so late every time? Look at you, youre getting thinner and thinner, I used to study without you being so exaggerated." In order not to argue with his mother, Chen went upstairs to his room in silence.',
            'perceives_zh-TW' => '每次回到家，媽媽總是唸說：「為什麼每次都這麼晚回家 ? 你看看你都越來越瘦了，我以前讀書都沒有你這樣子這麼誇張。」為了不跟媽媽起爭執，晨晨只好默默的上樓回房間。',
            'needs_en' => 'When he returned to his room, he found his younger siblings playing hide-and-seek in his room, and the whole room was made a mess.',
            'needs_zh-TW' => '回到房間後，發現弟弟妹妹在他房間玩捉迷藏，整個房間被弄得很亂。',
            'request_en' => 'When he returned to his room, he found his younger siblings playing hide-and-seek in his room, and the whole room was made a mess. After taking a shower, he talked to his brother, sister and mother about his recent situation...',
            'request_zh-TW' => '回到房間後，發現弟弟妹妹在他房間玩捉迷藏，整個房間被弄得很亂。疲憊的晨晨只好無奈的先把房間整理乾淨，洗完澡後再找弟弟、妹妹和媽媽講他最近的狀況…',
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);

        Cases::create([
            'name_en' => 'Case 2',
            'name_zh-TW' => '案例二',
            'description_en' => 'Xuan Xuan is a student with very good grades, but English is the most difficult barrier for her to cross. Whenever she has an English class at school, Xuan Xuan will be so nervous that she unconsciously stamps her nails. The first time I saw this, I was able to find out that your English grades needed to be improved. The first time I heard this, I was so shocked that I couldn`t sleep the whole night. The next day, Xuan Xuan found that she had strained her nails to the point of bleeding because she was overly nervous and anxious, so she decided to muster up the courage to tell her mother about her situation...',
            'description_zh-TW' => '宣宣是一位成績非常優秀的學生，唯有英文是她最難跨越的門檻。每次學校上英文課，宣宣就會緊張到不自覺的摳指甲。就在某天放學回家的時候，媽媽突然跟宣宣說：「妹妹~我發現你的英文成績異常的需要加強，明天放學我帶你去英文補習班補習。」宣宣聽到後嚇壞了，整個晚上睡不著。隔天天亮，宣宣發現她因為過度緊張焦慮，而把指甲摳到流血了，於是她決定鼓起勇氣跟媽媽說她的狀況...',
            'observes_en' => $faker->realText(100),
            'observes_zh-TW' =>'Xuan Xuan is a student with very good grades, but English is the most difficult barrier for her to cross. Whenever she has an English class at school, Xuan Xuan will be so nervous that she unconsciously stamps her nails.',
            'perceives_en' => 'Whenever the school has an English class, Xuan Xuan will be so nervous that he unconsciously stamps his nails. The first time I saw this, I found out that your English score needs to be strengthened, so I`ll take you to an English tutorial tomorrow after school. The first time I heard this, I was so shocked that I couldn`t sleep the whole night.',
            'perceives_zh-TW' => '每次學校上英文課，宣宣就會緊張到不自覺的摳指甲。就在某天放學回家的時候，媽媽突然跟宣宣說：「妹妹~我發現你的英文成績異常的需要加強，明天放學我帶你去英文補習班補習。」宣宣聽到後嚇壞了，整個晚上睡不著。',
            'needs_en' => 'The next day at dawn, Xuan Xuan found that she was overly nervous and anxious, and strained her nails until they bled.',
            'needs_zh-TW' => '隔天天亮，宣宣發現她因為過度緊張焦慮，而把指甲摳到流血了',
            'request_en' => 'The next day at dawn, Xuan Xuan found that she had strained her nails to the point of bleeding because she was overly nervous and anxious, so she decided to muster the courage to tell her mother about her situation...',
            'request_zh-TW' => '隔天天亮，宣宣發現她因為過度緊張焦慮，而把指甲摳到流血了，於是她決定鼓起勇氣跟媽媽說她的狀況...',
            'created_at' => Carbon::now('Asia/Taipei'),
            'updated_at' => Carbon::now('Asia/Taipei')
        ]);

        Cases::create([
            'name_en' => 'Case 3',
            'name_zh-TW' => '案例三',
            'description_en' => 'He is a second year student and a huge fan of BLACKPINK. Whenever the idol group released peripheral products or held concerts, Shing would always be the first to bet all his pocket money to support his favorite idol. One day when he was coming home from school, his mother suddenly said to Shing, "Brother, I heard Auntie Chen say today that his son has a habit of saving and saving money, so go get your bankbook and show it to mom. After hearing this, Shing was shocked and thought, "Oh no! I took all the money to buy BLACKPINK peripherals .....". He was afraid that he would be scolded by his mother. He was anxiously thinking whether I should tell my mother the truth or not ...........',
            'description_zh-TW' => '阿成是一個國二學生，同時也是 BLACKPINK 的超級粉絲。每當偶像團體出周邊商品或開演唱會時，阿成總會第一時間投注自己所有的零用錢，為了支持自己最喜愛的偶像。就在某天放學回家的時候，媽媽突然跟阿成說：「弟弟啊～我今天聽陳阿姨分享他兒子都有儲蓄及存錢的習慣誒，你去拿你的存摺來媽媽看看。」阿成聽到後嚇壞了心想「慘了啦！我把所有的錢都拿去買 BLACKPINK 周邊了.....」阿成整個晚上睡不著，生怕自己被媽媽大罵一頓，焦慮的想著我到底應不應該跟媽媽說實話呢...........',
            'observes_en' => 'He is a second year student and a huge fan of BLACKPINK. Whenever the idol group released peripheral products or held concerts, Shing would always be the first to bet all his pocket money to support his favorite idol.',
            'observes_zh-TW' =>'阿成是一個國二學生，同時也是 BLACKPINK 的超級粉絲。每當偶像團體出周邊商品或開演唱會時，阿成總會第一時間投注自己所有的零用錢，為了支持自己最喜愛的偶像。',
            'perceives_en' => 'One day when he was coming home from school, his mother suddenly said to Shing, "Brother, I heard Auntie Chan tell me today that his son has a habit of saving and saving money, so go get your bankbook and show it to me. After hearing this, Shing was shocked and thought, "Oh no! I took all the money to buy BLACKPINK peripherals ....."',
            'perceives_zh-TW' => '就在某天放學回家的時候，媽媽突然跟阿成說：「弟弟啊～我今天聽陳阿姨分享他兒子都有儲蓄及存錢的習慣誒，你去拿你的存摺來媽媽看看。」阿成聽到後嚇壞了心想「慘了啦！我把所有的錢都拿去買 BLACKPINK 周邊了.....」',
            'needs_en' => 'After hearing this, Shing was shocked and thought, `Oh no! I`ve spent all my money on BLACKPINK .....`. Ah Cheng couldn`t sleep the whole night, afraid that he would be scolded by his mother',
            'needs_zh-TW' => '阿成聽到後嚇壞了心想「慘了啦！我把所有的錢都拿去買 BLACKPINK 周邊了.....」阿成整個晚上睡不著，生怕自己被媽媽大罵一頓',
            'request_en' => 'Ah Cheng could not sleep the whole night, afraid of being yelled at by his mother, anxiously thinking whether I should tell my mother the truth or not ...........',
            'request_zh-TW' => '阿成整個晚上睡不著，生怕自己被媽媽大罵一頓，焦慮的想著我到底應不應該跟媽媽說實話呢...........',
            'created_at' => Carbon::now('Asia/Taipei'),
            'updated_at' => Carbon::now('Asia/Taipei')
        ]);

        Cases::create([
            'name_en' => 'Case 4',
            'name_zh-TW' => '案例四',
            'description_en' => 'She is always in a bad mood, and every day when she comes home, she sees that her parents are always arguing, so she can`t help but worry about whether they will divorce. When he arrives at school today, the teacher says that he is going to investigate the two students in Tian Ye as a group, and Jie wants to find his best friend Mu Mu to join him, but he doesn`t realize that Mu Mu Mu has already agreed to be in the group with her favorite boy, Xiao Chun. When she thinks about the upcoming midterm exams, she has a lot of progress to finish and she has to find another group member, she feels irritated. She was in a bad mood and thought, "Why do I have to do so many things .... 24 hours a day is not enough, so annoying". After school, Jie meets Miki in the corridor and decides to share with Miki what happened today...',
            'description_zh-TW' => '小潔最近心情總是不太好，每天回家看到爸爸媽媽總是在爭吵，小潔不禁煩惱著爸爸媽媽會不會離婚。而今天一到學校，老師說下禮拜田野調查兩位同學為一組，小潔想找他最好的朋友木木一起，卻沒想到木木已經說好了要跟她心儀的男生小春一組。心情本來就不好的小潔，想到即將迎面而來的期中考，自己卻有好多進度都還沒讀完，而且自己還要再找尋其他組員就覺得煩躁不已。心情不好的她心想：「怎麼要做的事情這麼多....一天24小時根本不夠用啊，好煩喔」。放學後，小潔在走廊遇到木木，小潔決定要跟木木開口分享今天遇到的事情...',
            'observes_en' => 'She is always in a bad mood, and every day when she comes home, she sees that her parents are always arguing, so she can`t help but worry about whether they will divorce.',
            'observes_zh-TW' =>'小潔最近心情總是不太好，每天回家看到爸爸媽媽總是在爭吵，小潔不禁煩惱著爸爸媽媽會不會離婚。',
            'perceives_en' => 'Every day when she comes home, she sees that her parents are always arguing and she can`t help but worry about whether they will divorce. When he arrives at school today, the teacher says that he is going to investigate the two students in Tian Ye as a group, and Jie wants to find his best friend Mu Mu to join him, but he doesn`t realize that Mu Mu Mu has already agreed to be in the group with her favorite boy, Xiao Chun. He is already in a bad mood, but when he thinks about the upcoming midterm exams, he has a lot of progress to finish, and he has to find another group member, he feels irritated.',
            'perceives_zh-TW' => '每天回家看到爸爸媽媽總是在爭吵，小潔不禁煩惱著爸爸媽媽會不會離婚。而今天一到學校，老師說下禮拜田野調查兩位同學為一組，小潔想找他最好的朋友木木一起，卻沒想到木木已經說好了要跟她心儀的男生小春一組。心情本來就不好的小潔，想到即將迎面而來的期中考，自己卻有好多進度都還沒讀完，而且自己還要再找尋其他組員就覺得煩躁不已。',
            'needs_en' => 'In a bad mood, she thought, "Why do I have to do so many things .... 24 hours a day is not enough, so annoying".',
            'needs_zh-TW' => '心情不好的她心想：「怎麼要做的事情這麼多....一天24小時根本不夠用啊，好煩喔」。',
            'request_en' => 'After school, Jae meets Miki in the corridor and decides to share with Miki what happened today...',
            'request_zh-TW' => '放學後，小潔在走廊遇到木木，小潔決定要跟木木開口分享今天遇到的事情...',
            'created_at' => Carbon::now('Asia/Taipei'),
            'updated_at' => Carbon::now('Asia/Taipei')
        ]);
    }
}
