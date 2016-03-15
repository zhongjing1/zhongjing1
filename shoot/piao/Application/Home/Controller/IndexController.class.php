<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends WechatController {
    public $codes = array('THEMAID','MAMA','OLDER','FATHER','CHILD','TRIP','ACCIDENT','DISEASE','FUND');
    public $codes_name = array(
                        'THEMAID'=>'家庭佣工保障',
                        'MAMA'=>'妈妈保险',
                        'OLDER'=>'老人人寿及护理保障',
                        'FATHER'=>'医疗保险',
                        'CHILD'=>'孩子医疗保险',
                        'TRIP'=>'旅游保险',
                        'ACCIDENT'=>'意外保险',
                        'DISEASE'=>'重大疾病保险',
                        'FUND'=>'儿童教育基金', //xb:FUND已单独移出
        );
    public $node = array(
        0 => array(
            'name' => '家庭佣工保障',
            'color' => 'pink',
            'code' => 'THEMAID',
            'nodes' =>array('雇主保障','家庭佣工保障'),
        ),
//        1 => array(
//            'name' => '妈妈保险',
//            'color' => 'yellow',
//            'code' => 'MAMA',
//            'nodes' =>array('基本保障','女性医疗','附加母子保障'),
//        ),
//        2 => array(
//            'name' => '老人人寿及护理保障',
//            'color' => 'grass',
//            'code' => 'OLDER',
//            'nodes' =>array('定期人寿保障','自选1:长期护理','自选2:住院现金'),
//        ),
        3 => array(
            'name' => '全球医疗保险',
            'color' => 'green',
            'code' => 'FATHER',
            'nodes' =>array('住院赔偿','门诊'),
        ),
//        4 => array(
//            'name' => '孩子医疗保险',
//            'color' => 'brightgreen',
//            'code' => 'CHILD',
//            'nodes' =>array('住院赔偿','门诊','自选额外福利'),
//        ),
        5 => array(
            'name' => '出港旅游保险',
            'color' => 'yellow2',
            'code' => 'TRIP',
            'nodes' =>array('医疗费用','个人意外','旅游中的不便','个人财物','第三方责任'),
        ),
        6 => array(
            'name' => '意外保险',
            'color' => 'redwine',
            'code' => 'ACCIDENT',
            'nodes' =>array('保障'),
        ),
        7 => array(
            'name' => '重大疾病保险',
            'color' => 'blue',
            'code' => 'DISEASE',
            'nodes' =>array('危疾保障','住院现金保障'),
        ),
        // xb:移除儿童教育基金部分
        // 8 => array(
        //    'name' => '儿童教育基金',
        //    'color' => 'bluefund',
        //    'code' => 'FUND',
        //    'nodes' =>array(),
        // ),
    );
    public $node1 = array(
        0 => array(
           'name' => '儿童教育基金',
           'color' => 'bluefund',
           'code' => 'FUND',
           'nodes' =>array(),
        ),
    );
    public $student_node = array(
        3 => array(
            'name' => '医疗保险',
            'color' => 'green',
            'code' => 'FATHER',
            'nodes' =>array('住院赔偿','门诊','自选额外福利'),
        ),
        4 => array(
            'name' => '意外保险',
            'color' => 'redwine',
            'code' => 'ACCIDENT',
            'nodes' =>array('保障'),
        ),
        5 => array(
            'name' => '旅游保险',
            'color' => 'yellow2',
            'code' => 'TRIP',
            'nodes' =>array('医疗费用','个人意外','旅游中的不便','个人财物','第三方责任'),
        ),
        7 => array(
            'name' => '重大疾病保险',
            'color' => 'blue',
            'code' => 'DISEASE',
            'nodes' =>array('全面等级','危疾保障','住院现金保障'),
        ),
    );
    public function index(){
        $this->display();
    }
    public function hk_student(){
        // xb:获取OpenID，触发跳转代码
        if(!isset($_SESSION['openId'])){
            $_SESSION['openId'] = parent::GetOpenid();
        }
        $node_color= array();
        $node  = $this->student_node;
        $points = array(
            3 =>array(
                '全球住院及手术保障+私家看护保障' ,
                '多种等级病房供灵活选择',
                '24小时免费全球紧急支援服务',
                '投保手续和理赔程序简单'
            ),
            4 =>array(
                '赔付意外死亡+永久性伤残' ,
                '保障多种运动和活动',
                '资助安置家庭康复设施',
                '自选保障暂时丧失工作能力+医疗费用+住院现金'
            ),
            5 =>array(
                '无需垫底费，保障大多数意外以及恐怖主义袭击' ,
                '不限国家和次数，单次保障期长达2个月',
                '提供危险户外运动保障',
                '24小时全球紧急支援服务',
                '豁免内地指定医院入院保证金'
            ),
            7 =>array(
                '覆盖40种严重疾病，提供一笔过现金赔偿' ,
                '免费定期健康检查' ,
                '住院现金津贴长达1000日' ,
            ),
        );
        
        $content_list = array();
        $list = array();
        foreach($node as $k=>$v){
            if(!empty($v['code'])){
                $content_list = D("content")->where(array('code'=>$v['code']))->order("orderby ASC")->select();
                $list[$v['code']] = $content_list;
            }
            $this->assign("code",$v['code']);
            $this->assign("color",$v['color']);
            $this->assign("code_name",$this->codes_name[$v['code']]);
            $node[$k]['input'] = $this->fetch('input/'.$v['code']);
        }
        $this->assign('biglist',$list);
        $this->assign("node_color",$node_color);
        $this->assign("node",$node);
        $this->assign("points",$points);
        $this->display();
    }
    public function child(){
        // //xb:获取OpenID，触发跳转代码
        // if(!isset($_SESSION['openId'])){
        //     $_SESSION['openId'] = parent::GetOpenid();
        // }
        $node_color= array();
        $node  = $this->node1;
        $points = array(
            0 =>array(
                '中长线美元储蓄，为子女未来教育做预备' ,
                '如果父母万一完全伤残或身故，保费豁免，给孩子的保障持续' ,
                '保单期内可提取部分现金，灵活规划财务状况' ,
                '不需要医疗核保，方便快捷' ,
            ),
        );
        $content_list = array();
        $list = array();
        foreach($node as $k=>$v){
            if(!empty($v['code'])){
                $content_list = D("content")->where(array('code'=>$v['code']))->order("orderby ASC")->select();
                $list[$v['code']] = $content_list;
            }
            $this->assign("code",$v['code']);
            $this->assign("color",$v['color']);
            $this->assign("code_name",$this->codes_name[$v['code']]);
            $node[$k]['input'] = $this->fetch('input/'.$v['code']);
        }
        $this->assign('biglist',$list);
        $this->assign("node_color",$node_color);
        $this->assign("node",$node);
        $this->assign("points",$points);
        /*
         * 微信部分  bTomkD1SSq9hED1E4iEu
         */
        $this->display();
    }

    public function gpmm(){
        //xb:获取OpenID，触发跳转代码
        if(!isset($_SESSION['openId'])){
           $_SESSION['openId'] = parent::GetOpenid();
        }
        $node_color= array();
        $node  = $this->node;
        $points = array(
            0 => array(
                '保障全面，雇主和雇员均受保障' ,
                '保障额高，雇员补偿高达1亿港币',
                '本地和外籍、全职和兼职家庭佣工均可投保',
                '投保时长灵活，一个月至两年不等'
            ),
            1 =>  array(
                '周全的女性癌症+疾病保障' ,
                '免费定期妇科检查',
                '母子均可附加保障',
                '身故体恤津贴'
            ),
            2 =>array(
                '身故赔偿和长期护理兼得保障' ,
                '提供每两年一次的免费身体检查',
                '保证续保，直至百岁'
            ),
            3 =>array(
                '全球保障、终身受保及续保保证' ,
                '每日私家看护费用补偿',
                '投保便捷，无需体检',
                '植入仪器费用一并纳入赔偿范围'
            ),
            4 =>array(
                '全球保障、终身受保及续保保证' ,
                '每日私家看护费用补偿',
                '投保便捷，无需体检',
                '植入仪器费用一并纳入赔偿范围'
            ),
            5 =>array(
                '无需垫底费，保障大多数意外以及恐怖主义袭击' ,
                '不限国家和次数，单次保障期长达2个月',
                '提供危险户外运动保障',
                '24小时全球紧急支援服务',
                '豁免内地指定医院入院保证金'
            ),
            6 =>array(
                '赔付意外死亡+永久性伤残' ,
                '保障多种运动和活动',
                '资助安置家庭康复设施',
                '自选保障暂时丧失工作能力+医疗费用+住院现金'
            ),
            7 =>array(
                '覆盖40种严重疾病，提供一笔过现金赔偿' ,
                '免费定期健康检查' ,
                '住院现金津贴长达1000日' ,
            ),
            8 =>array(
                '中长线美元储蓄，为子女未来教育做预备' ,
                '如果父母万一完全伤残或身故，保费豁免，给孩子的保障持续' ,
                '保单期内可提取部分现金，灵活规划财务状况' ,
                '不需要医疗核保，方便快捷' ,
            ),
        );
        $content_list = array();
        $list = array();
        foreach($node as $k=>$v){
            if(!empty($v['code'])){
                $content_list = D("content")->where(array('code'=>$v['code']))->order("orderby ASC")->select();
                $list[$v['code']] = $content_list;
            }
            $this->assign("code",$v['code']);
            $this->assign("color",$v['color']);
            $this->assign("code_name",$this->codes_name[$v['code']]);
            $node[$k]['input'] = $this->fetch('input/'.$v['code']);
        }
        $this->assign('biglist',$list);
        $this->assign("node_color",$node_color);
        $this->assign("node",$node);
        $this->assign("points",$points);
        /*
         * 微信部分  bTomkD1SSq9hED1E4iEu
         */
        $this->display();
    }
    // 计算价格
    public function countPrice(){
        $codes = $this->codes;
        $code = I("post.code");
        if(in_array($code,$codes)){
            $total_fun = $code . '_total';
            echo $this->$total_fun();
        }else{
            echo 0;
        }
    }

    private function FUND_total(){
        $age = I("post.age","15",'intval');
        $amount = I("post.fundamount","50",'intval');
        $vocation = I("post.fundvocation","1",'intval');
        if(!in_array($amount,array(50,100,200))){
            $amount = 50;
        }
        if(!in_array($vocation,array(1,2,3))){
            $vocation = 1;
        }
        $final_tactor[50] = 64.4;
        $final_tactor[100] = 64;
        $final_tactor[200] = 63.7;
        $info = array(15 => array(1.50,2.25,3.00),
            16 => array(1.50,2.25,3.00),
            17 => array(1.50,2.25,3.00),
            18 => array(1.50,2.25,3.00),
            19 => array(1.50,2.25,3.00),
            20 => array(1.55,2.33,3.10),
            21 => array(1.60,2.40,3.20),
            22 => array(1.65,2.48,3.30),
            23 => array(1.70,2.55,3.40),
            24 => array(1.75,2.63,3.50),
            25 => array(1.80,2.70,3.60),
            26 => array(1.85,2.78,3.70),
            27 => array(1.90,2.85,3.80),
            28 => array(1.95,2.93,3.90),
            29 => array(2.00,3.00,4.00),
            30 => array(2.05,3.08,4.10),
            31 => array(2.10,3.15,4.20),
            32 => array(2.15,3.23,4.30),
            33 => array(2.20,3.30,4.40),
            34 => array(2.25,3.38,4.50),
            35 => array(2.35,3.53,4.70),
            36 => array(2.45,3.68,4.90),
            37 => array(2.55,3.83,5.10),
            38 => array(2.65,3.98,5.30),
            39 => array(2.75,4.13,5.50),
            40 => array(2.85,4.28,5.70),
            41 => array(2.95,4.43,5.90),
            42 => array(3.05,4.58,6.10),
            43 => array(3.15,4.73,6.30),
            44 => array(3.25,4.88,6.50),
            45 => array(3.40,5.10,6.80),
            46 => array(3.55,5.33,7.10),
            47 => array(3.70,5.55,7.40),
            48 => array(3.85,5.78,7.70),
            49 => array(4.00,6.00,8.00),
            50 => array(4.20,6.30,8.40),
            51 => array(4.50,6.75,9.00),
            52 => array(4.90,7.35,9.80),
            53 => array(5.50,8.25,11.00),
            54 => array(6.50,9.75,13.00),
        );
        $a = $amount* 10 * $final_tactor[$amount];
        if($age<15 || $age > 54){
            $b = 0;
        }else{
            $b = ($a/8)/100 * $info[$age][$vocation-1] * 8 ;
        }
        $total = $a+$b;
        return $total;
    }
    private function MAMA_total(){
        $age = I("post.age");
        $option = I("post.option");
        $plan = I("post.plan");
        if(!in_array($plan,array(1,2,3))){
            $plan = 1;
        }
        $option = $this->tozeroandone($option);
        $where = array(
            'age' => intval($age),
            'optional' => intval($option),
        );
        $field = "plan". $plan . '_annually';
        $data =  M("monther")->field($field)->where($where)->find();
        $price = $data[$field];
        return $price;
    }
    private function CHILD_total(){
        RETURN $this->FATHER_total();
    }
    private function FATHER_total(){
        $age = I("post.age",0,'intval');
        $plan = I("post.plan",1,'intval');
        $payway = I("post.payway",1,'intval');
        $option = I("post.option",0,'intval');
        if(!in_array($plan,array(1,2,3))){
            $plan = 1;
        }
        if(!in_array($payway,array(1,2))){
            $payway = 1;
        }
        if(!in_array($option,array(0,1,2,3))){
            $option = 0;
        }
        $where = array(
            'age' => $age,
        );
        switch($option){
            case 0:
            default:
             $where['optional'] = array("IN",'0');
            break;
            case 1:
             $where['optional'] = array("IN",'0,1');
                break;
            case 2:
                $where['optional'] = array("IN",'0,2');
                break;
            case 3:
                $where['optional'] = array("IN",'0,1,2');
                break;
        }
       // var_dump($where);
        $field = "room". ($plan==1 ? 3 : ($plan==3 ? 1 : 2) ) . ($payway==2 ? '_monthly' : '_annually'  ) ;
        //echo $field;
        $data =  M("medical")->field("SUM($field) as $field")->where($where)->select();
        $price = $data[0][$field];
        return $price;
    }
    /*
     * 意外险
     */
    private function ACCIDENT_total(){
        $plan = I("post.plan",1,'intval');
        $amount = I("post.amount",0,'intval'); // 万元
        $payway = I("post.payway",1,'intval');
        $option1 = I("post.option1",0,'intval');
        $option2 = I("post.option2",0,'intval');
        $option3 = I("post.option3",0,'intval');
        if(!in_array($plan,array(1,2,3,4,5))){
            $plan = 1;
        }
        if($amount < 50){
            $amount = 50;
        }
        $amount = $amount * 10000 ;
        if(!in_array($payway,array(1,2))){
            $payway = 1;
        }
        $payway = $payway==1 ? 1 : 0.0892;
        $total = 0;
        $str1 = '1NANANA' . $plan  . 1;
        $total = $amount * $this->getRang($str1) * $payway;
        if($option1 >= 5000 ){
            $option1 = 5000;
        }
        if($option1 > 0){
            $str2 = '2NANANA' . $plan  . 1;
            $total += round($option1 * $this->getRang($str2) * $payway , 2 );
        }
        if($option2 > 0 && $option2 < 10000 ){
            $option2 = 10000;
        }
        if($option2 > 50001 ){
            $option2 = 50000;
        }
        if($option2 > 0){
           $step = ($option2 < 20001) ? 1 : ($option2 < 30001 ? 2 : ($option2 < 40001 ? 3 : ($option2 < 50001 ? 4 : 0 ))) ;
           $str3 = '3NANANA' . $plan  . $step;
           $total += round($option2 * $this->getRang($str3) * $payway, 2);
        }
        if($option3 > 0 && $option3 < 500 ){
            $option3 = 500;
        }
        if($option3 > 1000 ){
            $option3 = 1000;
        }
        if($option3 > 0){
            $str4 = '4NANANA' . $plan  . 1;
            $total += round($option3 * $this->getRang($str4) * $payway , 2 );
        }
        return $total;
    }
/*
 * 旅游险
 */
    private function TRIP_total(){
        $plan = I("post.plan",1,'intval');
        $range = I("post.range",1,'intval'); // 保障范围
        $PeriodsTrip = I("post.PeriodsTrip",1,'intval');
        $countadult = I("post.countadult",0,'intval');
        $countadult2 = I("post.countadult2",0,'intval');
        $countchild = I("post.countchild",0,'intval');
        $countchild2 = I("post.countchild2",0,'intval');
        $insured = I("post.insured",0,'intval');
        $wifeinsured = I("post.wifeinsured",0,'intval');
        if(!in_array($plan,array(1,2,3))){
            $plan = 1;
        }
        if(!in_array($range,array(1,2,3))){
            $range = 1 ;
        }
        $range--;
        if($plan == 1 &&  $PeriodsTrip > 7){
            $PeriodsTrip = 7;
        }
        if($plan == 2 &&  $PeriodsTrip > 181){
            $PeriodsTrip = 181;
        }
        if($plan == 3 ){
            $PeriodsTrip = 366;
        }
        $cost = 0;
        $adult = ($insured == 1 ? 1 : 0) +  ($wifeinsured == 1 ? 1 : 0);
        if($plan == 3){ //全年旅游
            $child = $countchild2;
            if($adult == 0 && $child > 0){
               return  $cost = ($child + $countadult2) * 1600;   // 需要核对
            }
            if($adult > 0){
                return  $cost =  3200 + ($countadult2) * 1600;
            }
        }
        if($plan < 3 ) { //单程
            $adult += $countadult2;
            $tripinfo = $range*100 + min($PeriodsTrip,32);
            $adult_trip = $this->gettrip($tripinfo,0); // 指数1 成人列为0,小孩为1
            $tripinfo = $range*100 + 33;
            $adult_trip2 = $this->gettrip($tripinfo,0); // 指数2 成人列为0,小孩为1
            $week = ceil( ($PeriodsTrip -min($PeriodsTrip,32)) / 7 );
            $cost = $adult * ( $adult_trip + $adult_trip2*$week );
            $child_trip = $this->gettrip($range*100+$PeriodsTrip,1); // 指数1 成人列为0,小孩为1
            $child_trip2 = $this->gettrip($range*100 + 33,1); // 指数2 成人列为0,小孩为1
            $childcodt = $countchild2 * ($child_trip + $child_trip2*$week);
            $cost += $childcodt;
            return $cost;
        }
    }
    /*
     * 老人人寿
     */
    private function OLDER_total(){
        $sex = I("post.sex","female");
        $age = I("post.age",46,'intval'); // 保障范围
        $issmoker = I("post.issmoker","smoker");
        $older_amount = I("post.older_amount",4,'intval');
        $Timelimit = I("post.Timelimit",0,'intval');
        $Timelimit_amount = I("post.Timelimit_amount",0,'intval');
        $cash_amount = I("post.cash_amount",0,'intval');
        if(!in_array($sex,array('female','male'))){
            $sex = 'female';
        }
        $age = $age < 46 ? 46 : ($age> 99 ? 99 : $age );
        if(!in_array($issmoker,array('smoker','nosmoker'))){
            $issmoker = 'smoker' ;
        }
        $older_amount = $older_amount < 4 ? 4 : ($older_amount> 80 ? 80 : $older_amount );
        if(!in_array($Timelimit,array(0,5,50))){
            $Timelimit = 0 ;
        }
        if(!in_array($Timelimit_amount,array(0,2800,5200,10000))){
            $Timelimit_amount = 0 ;
        }
        if(!in_array($cash_amount,array(0,400,800,1200,1600,2000))){
            $cash_amount = 0 ;
        }
        $where = array(
            'age' => intval($age),
        );
        $field = $issmoker . "_". $sex ;
        $plan_field = "plan_" .$sex ;
        $data =  M("elder")->field("$field,$plan_field")->where($where)->find();
        $cash_amount_info = $data[$plan_field];
        $basic = $data[$field] * $older_amount * 10 ;  //基本的]
        if($Timelimit > 0){
            $Timelimit = $Timelimit == 5 ? '5years' : 'wholelife';
            $field = $sex . "_" .$Timelimit . "_" . ($Timelimit_amount/8)  ;
            $data =  M("elder2")->field($field)->where($where)->find();
            $basic += $data[$field];
        }
        if($cash_amount > 0){
            $basic +=  ( $cash_amount_info * ($cash_amount /8) / 50 );
        }
        return $basic;
    }
    //菲佣
    public function THEMAID_total(){
        $leix = I("post.leix",1,"intval");
        $baoz = I("post.baoz",10,'intval');
        if(!in_array($leix,array(1,2))){
            $leix = 1 ;
        }
        if(!in_array($baoz,array(10,1,20,3))){
            $baoz = 10 ;
        }
        $data =  array(
            1 => array(1=>120, 3=>280, 10=> 300 , 20 => 550),
            2 => array(10=> 730 , 20 => 1320),
        );
        return $data[$leix][$baoz];
    }
    /*
     * 重疾
     */
    public function DISEASE_total(){
        $age = I("post.age",1,'intval'); // 保障范围
        $issmoker = I("post.issmoker",1,'intval');
        $payway = I("post.payway",1,'intval');
        $Dangerousinfo = I("post.Dangerousinfo",0,'intval');
        $cashsupport = I("post.cashsupport",0,'intval');
        if(!in_array($issmoker,array(1,2))){  // 吸烟者, 非吸烟者
            $issmoker = 2 ;
        }
        if(!in_array($payway,array(1,2))){ // 年付 ,月付
            $payway = 1 ;
        }
        if($Dangerousinfo > 0){
            if(!in_array($Dangerousinfo,array(250000,500000,1000000))){ // 年付 ,月付
                $Dangerousinfo = 250000 ;
            }
        }
        if($cashsupport > 0){
            if(!in_array($cashsupport,array(500,1000,1500))){ // 年付 ,月付
                $cashsupport = 500 ;
            }
        }
        $total = 0;
        if($age < 20){
            $step_age  = $age < 10 ? 1 : ($age < 15 ? 2 : ($age < 20 ? 3 : 1) );
        }elseif($age < 60){
            $step_age = floor($age/10) + 2;
        }elseif($age < 76){
            $step_age  = $age < 65 ? 8 : ($age < 70 ? 9 : 10 );
        }else{
            $step_age = 10;
        }
        $where = array(
            'agestep' => intval($step_age),
        );
        if($Dangerousinfo > 0){
            $field = "data". $issmoker . $payway . ( $Dangerousinfo/10000 ) ;
            $data =  M("disease")->field($field)->where($where)->find();
            $total1 = $data[$field];
        }
        if($cashsupport > 0){
            $k = 0;
            if($payway = 1){ // 年付
                $k =  $cashsupport == 500 ? 1 : ($cashsupport == 1000 ? 3 : 5);
            }
            if($payway = 0){ // 年付
                $k =  $cashsupport == 500 ? 0 : ($cashsupport == 1000 ? 2 : 4);
            }
            $total2 = $this->gethosptal($step_age,$k);
        }
        if($Dangerousinfo > 0 && $cashsupport > 0){
            $total = ($total1+$total2) * 0.9;
        }else{
            $total = ($total1+$total2);
        }
        return round($total);
    }
    private function gethosptal($agestep,$v){
        $data = array(
            1 => array(90,1008,180,2016,270,3024),
            2 => array(56,622,111,1245,167,1867),
            3 => array(56,622,111,1245,167,1867),
            4 => array(46,521,93,1042,139,1562),
            5 => array(58,652,116,1304,174,1955),
            6 => array(94,1058,189,2117,283,3175),
            7 => array(135,1518,271,3036,406,4554),
            8 => array(281,3147,561,6293,842,9440),
            9 => array(281,3147,561,6293,842,9440),
            10 => array(462,5180,924,10361,1386,15541),
        );
        return $data[$agestep][$v];
    }
    // 下一步 保存
    public function nextstep(){
        if(IS_POST){
            $data = array(
                'price' => floatval(str_replace(",",'',I("post.price"))),
                'content' => I("post.content",'',"strip_tags,stripslashes"),
                'price_content' => I("post.price_content",'','strip_tags,stripslashes'),
                'created' => time(),
                'session_id' => session_id(),
                'name' => I("post.name",'',"strip_tags,stripslashes"),
                'tel' => I("post.tel",'',"strip_tags,stripslashes"),
                'wechat' => I("post.name",'',"strip_tags,stripslashes"),
                'email' => I("post.email",'',"strip_tags,stripslashes"),
            );
            $booking = M("booking");
            $bookid = $booking->data($data)->add();
            if( $bookid > 0) {
                $info = $data;
                $content = array();
                $content[] = "单号："  . date("Ymd",$data['created']) . '00'  . $bookid ;
                $content[] = "下单时间："  . date("Y-m-d H:i:s",$data['created']);
                $content[] = "总价："  . $info['price'];
                $content[] = "价格明细："  . $info['price_content'];
                $content[] = "套餐内容："  . $info['content'];
                $content[] = "联系人："  . $info['name'];
                $content[] = "联系电话："  . $info['tel'];
                $content[] = "联系微信："  . $info['wechat'];
                $content[] = "Email："  . $info['email'];
                $this->assign("content",$content);
                $body = $this->fetch("mail");
                SendMail(array($data['email']),'中精订单',$body,$info['name']);
            }
            echo $bookid;
            exit();
        }
        echo 0;
        exit();
    }
    public function inputinfo(){
        $id = I("get.id");
        if(IS_POST && $id > 0){
            $session_id = session_id();
            $where['session_id'] = $session_id;
            $where['id']         = $id;
            $data = array(
                'name' => I("post.name",'',"strip_tags,stripslashes"),
                'tel' => I("post.tel",'',"strip_tags,stripslashes"),
                'wechat' => I("post.name",'',"strip_tags,stripslashes"),
                'email' => I("post.email",'',"strip_tags,stripslashes"),
                'isinoffice' => I("post.needoffice",0,"intval"),
            );
            $booking = M("booking");
            $result = $booking->where($where)->save($data);
            $info = $booking->where($where)->find();
            if( filter_var($data['email'], FILTER_VALIDATE_EMAIL) ) {
                $content = array();
                $content[] = "单号："  . date("Ymd",$info['created']) . '00'  . $info['id'] ;
                $content[] = "下单时间："  . date("Y-m-d H:i:s",$info['created']);
                $content[] = "总价："  . $info['price'];
                $content[] = "价格明细："  . $info['price_content'];
                $content[] = "套餐内容："  . $info['content'];
                $content[] = "联系人："  . $info['name'];
                $content[] = "联系电话："  . $info['tel'];
                $content[] = "联系微信："  . $info['wechat'];
                $content[] = "Email："  . $info['email'];
                $this->assign("content",$content);
                $body = $this->fetch("mail");
                SendMail(array($data['email']),'网站订单测试',$body,$info['name']);
            }
            echo $id;
            exit();
        }else{
            $this->display("input");
        }
    }
    public function tozeroandone($str){
        if( $str == 'true' ){
            return 1;
        }else{
            return 0;
        }
    }
    private function getRang($str){
        $rang = array(
            '1NANANA11' => '0.0009',
            '1NANANA21' => '0.0013',
            '1NANANA31' => '0.0020',
            '1NANANA41' => '0.0030',
            '1NANANA51' => '0.0010',
            '2NANANA11' => '0.2300',
            '2NANANA21' => '0.3400',
            '2NANANA31' => '0.5400',
            '2NANANA41' => '0.6680',
            '2NANANA51' => '0',
            '3NANANA11' => '0.0374',
            '3NANANA21' => '0.0435',
            '3NANANA31' => '0.0643',
            '3NANANA41' => '0.1218',
            '3NANANA51' => '0.0333',
            '3NANANA12' => '0.0309',
            '3NANANA22' => '0.0363',
            '3NANANA32' => '0.0536',
            '3NANANA42' => '0',
            '3NANANA52' => '0.0278',
            '3NANANA13' => '0.0289',
            '3NANANA23' => '0.0340',
            '3NANANA33' => '0',
            '3NANANA43' => '0',
            '3NANANA53' => '0',
            '3NANANA14' => '0.0270',
            '3NANANA24' => '0',
            '3NANANA34' => '0',
            '3NANANA44' => '0',
            '3NANANA54' => '0',
            '4NANANA11' => '0.5600',
            '4NANANA21' => '0.7500',
            '4NANANA31' => '0.9600',
            '4NANANA41' => '1.3800',
            '4NANANA51' => '0',
        );
        return $rang[$str];
    }
    private function gettrip($code,$index){
        $list = array(1 => array(58,27),
            2 => array(87,41),
            3 => array(110,52),
            4 => array(133,64),
            5 => array(142,69),
            6 => array(149,71),
            7 => array(156,73),
            8 => array(163,77),
            9 => array(168,79),
            10 => array(172,83),
            11 => array(176,87),
            12 => array(182,86),
            13 => array(186,90),
            14 => array(191,92),
            15 => array(194,95),
            16 => array(197,97),
            17 => array(201,98),
            18 => array(205,98),
            19 => array(208,102),
            20 => array(211,104),
            21 => array(215,104),
            22 => array(218,107),
            23 => array(221,107),
            24 => array(223,108),
            25 => array(226,109),
            26 => array(228,110),
            27 => array(230,112),
            28 => array(232,114),
            29 => array(234,116),
            30 => array(237,115),
            31 => array(239,117),
            32 => array(242,117),
            33 => array(49,27),
            101 => array(76,37),
            102 => array(127,67),
            103 => array(168,88),
            104 => array(208,110),
            105 => array(221,112),
            106 => array(233,119),
            107 => array(245,124),
            108 => array(256,130),
            109 => array(267,135),
            110 => array(278,143),
            111 => array(290,148),
            112 => array(301,155),
            113 => array(313,160),
            114 => array(323,165),
            115 => array(334,170),
            116 => array(344,176),
            117 => array(355,179),
            118 => array(365,185),
            119 => array(371,184),
            120 => array(377,188),
            121 => array(382,191),
            122 => array(389,193),
            123 => array(393,196),
            124 => array(397,199),
            125 => array(402,201),
            126 => array(406,204),
            127 => array(413,204),
            128 => array(417,208),
            129 => array(422,209),
            130 => array(426,212),
            131 => array(429,216),
            132 => array(434,215),
            133 => array(105,57),
            201 => array(105,53),
            202 => array(173,91),
            203 => array(231,120),
            204 => array(289,150),
            205 => array(312,159),
            206 => array(330,167),
            207 => array(343,175),
            208 => array(355,179),
            209 => array(365,185),
            210 => array(373,188),
            211 => array(379,189),
            212 => array(384,194),
            213 => array(392,196),
            214 => array(397,199),
            215 => array(403,202),
            216 => array(408,206),
            217 => array(415,208),
            218 => array(420,211),
            219 => array(426,217),
            220 => array(432,219),
            221 => array(438,221),
            222 => array(442,225),
            223 => array(447,226),
            224 => array(452,228),
            225 => array(457,230),
            226 => array(461,233),
            227 => array(465,236),
            228 => array(470,238),
            229 => array(475,240),
            230 => array(480,241),
            231 => array(484,245),
            232 => array(488,248),
            233 => array(118,63),
         );
        return $list[$code][$index];
    }
    /*
     * 微信pay
     */
    public function weixinpay(){
        $amount = floatval(I("post.amount"));
        $total_hkd = $amount * 85 ;
        $total_cny = round($total_hkd,2) ;
        $input = new WxPayUnifiedOrder();
        $input->SetBody("中精保险");
        $input->SetAttach("中精保险");
        $input->SetOut_trade_no(session_id());
        $input->SetTotal_fee($total_hkd);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("中精保险");
        $input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($_SESSION['openId']);
        $order = WxPayApi::unifiedOrder($input);
        $jsApiParameters = parent::GetJsApiParameters($order);
        arrtofile($jsApiParameters);
        echo json_encode($jsApiParameters);
    }
}
