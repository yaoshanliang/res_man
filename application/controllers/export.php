<?php 
	class export extends MY_Controller
	{
		public function index()
		{
			$this->load->view("export/main");
		}

		public function do_export()
		{
			$this->load->library('PHPExcel');
			$this->load->library('PHPExcel/IOFactory');
			$objPHPExcel = new PHPExcel();

			$filename = $this->input->post('filename');
			if($filename==""||$filename==null) $filename="statitics";
			$m_exportType = $this->input->post('type');
			// 设置excel文档的属性
			$objPHPExcel->getProperties()->setCreator("Sam.c")
			             ->setLastModifiedBy("Sam.c Test")
			             ->setTitle("Microsoft Office Excel Document")
			             ->setSubject("Test")
			             ->setDescription("Test")
			             ->setKeywords("Test")
			             ->setCategory("Test result file");


			$this->do_funds($objPHPExcel);
			$this->do_valid($objPHPExcel);
			$this->do_copyright($objPHPExcel);
			$this->do_patent($objPHPExcel);
			$this->do_award($objPHPExcel);
			$this->do_work($objPHPExcel);
			$this->do_part($objPHPExcel);
			$this->do_learn($objPHPExcel);
			$this->do_cooperation($objPHPExcel);

			// 如果需要输出EXCEL格式
			if($m_exportType=="excel"){   
				$filename = $filename.".xlsx";
			    $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');
			    // 从浏览器直接输出$filename
			    header("Pragma: public");
			    header("Expires: 0");
			    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
			    header("Content-Type:application/force-download");
			    header("Content-Type:application/vnd.ms-excel;");
			    header("Content-Type:application/octet-stream");
			    header("Content-Type:application/download");
			    header("Content-Disposition:attachment;filename=".$filename);
			    header("Content-Transfer-Encoding:binary");
			    $objWriter->save("php://output"); 
			}
			// 如果需要输出PDF格式
			if($m_exportType=="pdf"){
				$filename = $filename.".pdf";
			    $objWriter = IOFactory::createWriter($objPHPExcel, 'PDF');
			    $objWriter->setSheetIndex(0);
			    header("Pragma: public");
			    header("Expires: 0");
			    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
			    header("Content-Type:application/force-download");
			    header("Content-Type:application/pdf");
			    header("Content-Type:application/octet-stream");
			    header("Content-Type:application/download");
			    header("Content-Disposition:attachment;filename=".$filename);
			    header("Content-Transfer-Encoding:binary");
			    $objWriter->save("php://output"); 
			}

			$objPHPExcel->disconnectWorksheets();
        	unset($objPHPExcel);
		}

		private function do_funds($objPHPExcel)
		{
			$objPHPExcel->setActiveSheetIndex(0);
			// 设置工作薄名称
			$objPHPExcel->getActiveSheet()->setTitle("科研经费到款情况");
			// 设置默认字体和大小
			$objPHPExcel->getDefaultStyle()->getFont()->setName("宋体");
			$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

			//列宽度自适应
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

			// 标题栏
			$objPHPExcel->getActiveSheet()->mergeCells('A1:L1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ICES研究中心2013年度科研项目经费到款情况');

			//信息栏
			$objPHPExcel->getActiveSheet()->setCellValue('A2', '序号');
			$objPHPExcel->getActiveSheet()->setCellValue('B2', '项目名称');
			$objPHPExcel->getActiveSheet()->setCellValue('C2', '项目来源');
			$objPHPExcel->getActiveSheet()->setCellValue('D2', '项目负责人');
			$objPHPExcel->getActiveSheet()->setCellValue('E2', '开始时间');
			$objPHPExcel->getActiveSheet()->setCellValue('F2', '结束时间');
			$objPHPExcel->getActiveSheet()->setCellValue('G2', '合同额(万元)');
			$objPHPExcel->getActiveSheet()->setCellValue('H2', '2013年到款');
			$objPHPExcel->getActiveSheet()->setCellValue('I2', '未到款');
			$objPHPExcel->getActiveSheet()->setCellValue('J2', '课题合同号');
			$objPHPExcel->getActiveSheet()->setCellValue('K2', '经费卡号');
			$objPHPExcel->getActiveSheet()->setCellValue('L2', '备注');

			$this->load->model('project');
			$i = 3;
			$res = $this->project->getProject();
			foreach($res as $item)
			{
				// $name,$source,$level,$principal,$start,$end,$money,$currency,$contract,$credit,$type
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $i-2);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $item->name);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $item->source);
				$person_name = $this->db->where('id',$item->principal)->get('person')->row()->name;
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $person_name);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $item->start);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $item->end);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $item->money);
				// $objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $currency);
				// $objPHPExcel->getActiveSheet()->setCellValue('I2', );
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $item->contract);
				$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $item->credit);
				// $objPHPExcel->getActiveSheet()->setCellValue('L2', '备注');

				$i++;
			}
		}

		private function do_valid($objPHPExcel)
		{
			$msgWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'card_message'); //创建一个工作表
        	$objPHPExcel->addSheet($msgWorkSheet); //插入工作表
			$objPHPExcel->setActiveSheetIndex(1);
			// 设置工作薄名称
			$objPHPExcel->getActiveSheet()->setTitle("科研项目鉴定(验收)情况");
			// 设置默认字体和大小
			$objPHPExcel->getDefaultStyle()->getFont()->setName("宋体");
			$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

			//列宽度自适应
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);

			// 标题栏
			$objPHPExcel->getActiveSheet()->mergeCells('A1:M1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ICES研究中心2013年度科研项目鉴定(验收)情况');

			//信息栏
			$objPHPExcel->getActiveSheet()->setCellValue('A2', '序号');
			$objPHPExcel->getActiveSheet()->setCellValue('B2', '项目名称');
			$objPHPExcel->getActiveSheet()->setCellValue('C2', '项目来源');
			$objPHPExcel->getActiveSheet()->setCellValue('D2', '项目负责人');
			$objPHPExcel->getActiveSheet()->setCellValue('E2', '开始时间');
			$objPHPExcel->getActiveSheet()->setCellValue('F2', '结束时间');
			$objPHPExcel->getActiveSheet()->setCellValue('G2', '合同额(万元)');
			$objPHPExcel->getActiveSheet()->setCellValue('H2', '类型');
			$objPHPExcel->getActiveSheet()->setCellValue('I2', '鉴定(验收)时间');
			$objPHPExcel->getActiveSheet()->setCellValue('J2', '鉴定验收组织单位');
			$objPHPExcel->getActiveSheet()->setCellValue('K2', '课题合同号');
			$objPHPExcel->getActiveSheet()->setCellValue('L2', '经费卡号');
			$objPHPExcel->getActiveSheet()->setCellValue('M2', '备注');

			$this->load->model('project');
			$i = 3;
			$res = $this->project->getProject();
			foreach($res as $item)
			{
				// $name,$source,$level,$principal,$start,$end,$money,$currency,$contract,$credit,$type
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $i-2);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $item->name);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $item->source);
				$person_name = $this->db->where('id',$item->principal)->get('person')->row()->name;
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $person_name);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $item->start);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $item->end);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $item->money);
				// $objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $currency);
				// $objPHPExcel->getActiveSheet()->setCellValue('I2', );
				// $objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $item->contract);
				// $objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $item->credit);
				// $objPHPExcel->getActiveSheet()->setCellValue('L2', '备注');

				$i++;
			}
		}

		private function do_copyright($objPHPExcel)
		{
			$msgWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'card_message'); //创建一个工作表
        	$objPHPExcel->addSheet($msgWorkSheet); //插入工作表
			$objPHPExcel->setActiveSheetIndex(2);
			// 设置工作薄名称
			$objPHPExcel->getActiveSheet()->setTitle("软件著作权情况");
			// 设置默认字体和大小
			$objPHPExcel->getDefaultStyle()->getFont()->setName("宋体");
			$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

			//列宽度自适应
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

			// 标题栏
			$objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ICES研究中心2013年度 获软件著作权情况');

			//信息栏
			$objPHPExcel->getActiveSheet()->setCellValue('A2', '序号');
			$objPHPExcel->getActiveSheet()->setCellValue('B2', '软件著作权名称');
			$objPHPExcel->getActiveSheet()->setCellValue('C2', '软件著作权登记号');
			$objPHPExcel->getActiveSheet()->setCellValue('D2', '著作权人');
			$objPHPExcel->getActiveSheet()->setCellValue('E2', '授予单位');
			$objPHPExcel->getActiveSheet()->setCellValue('F2', '授予时间');
			$objPHPExcel->getActiveSheet()->setCellValue('G2', '人员名单');

			$this->load->model('copyright');
			$this->load->model('copyrightlist');  
			$i = 3;
			$res = $this->copyright->getCopyright();
			foreach($res as $item)
			{
				// $number,$name,$register,$person,$institute,$time,$which
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $i-2);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $item->name);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $item->register);
				$person_name = $this->db->where('id',$item->person)->get('person')->row()->name;
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $person_name);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $item->institute);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $item->time);

			    $res2 = $this->copyrightlist->getCopyrightlist($item->number);
			    $str = "";
			    foreach($res2 as $item2)
			    {
			      for($j=0;$j<10;$j++)
			      {
			        if($j == $item2->order)
			        {
			          $res3 = $this->db->where('id',$item2->id)->get('person');
			          $str .= $res3->row()->name.",";
			        }
			      }
			    }
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, rtrim($str,','));

				$i++;
			}
		}

		private function do_patent($objPHPExcel)
		{
			$msgWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'card_message'); //创建一个工作表
        	$objPHPExcel->addSheet($msgWorkSheet); //插入工作表
			$objPHPExcel->setActiveSheetIndex(3);
			// 设置工作薄名称
			$objPHPExcel->getActiveSheet()->setTitle("专利情况");
			// 设置默认字体和大小
			$objPHPExcel->getDefaultStyle()->getFont()->setName("宋体");
			$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

			//列宽度自适应
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

			// 标题栏
			$objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ICES研究中心2013年度 获专利情况');

			//信息栏
			$objPHPExcel->getActiveSheet()->setCellValue('A2', '序号');
			$objPHPExcel->getActiveSheet()->setCellValue('B2', '专利名称');
			$objPHPExcel->getActiveSheet()->setCellValue('C2', '专利编号');
			$objPHPExcel->getActiveSheet()->setCellValue('D2', '专利权人');
			$objPHPExcel->getActiveSheet()->setCellValue('E2', '授予单位');
			$objPHPExcel->getActiveSheet()->setCellValue('F2', '授予时间');
			$objPHPExcel->getActiveSheet()->setCellValue('G2', '人员名单');

			$this->load->model('patent');
			$this->load->model('patentlist');  
			$i = 3;
			$res = $this->patent->getPatent();
			foreach($res as $item)
			{
				// $number,$name,$register,$person,$institute,$time,$which
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $i-2);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $item->name);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $item->register);
				$person_name = $this->db->where('id',$item->person)->get('person')->row()->name;
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $person_name);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $item->institute);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $item->time);

			    $res2 = $this->patentlist->getPatentlist($item->number);
			    $str = "";
			    foreach($res2 as $item2)
			    {
			      for($j=0;$j<10;$j++)
			      {
			        if($j == $item2->order)
			        {
			          $res3 = $this->db->where('id',$item2->id)->get('person');
			          $str .= $res3->row()->name.",";
			        }
			      }
			    }
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, rtrim($str,','));

				$i++;
			}
		}

		private function do_award($objPHPExcel)
		{
			$msgWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'card_message'); //创建一个工作表
        	$objPHPExcel->addSheet($msgWorkSheet); //插入工作表
			$objPHPExcel->setActiveSheetIndex(4);
			// 设置工作薄名称
			$objPHPExcel->getActiveSheet()->setTitle("获奖情况");
			// 设置默认字体和大小
			$objPHPExcel->getDefaultStyle()->getFont()->setName("宋体");
			$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

			// 标题栏
			$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ICES研究中心2013年度科研项目鉴定(验收)情况');

			//列宽度自适应
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

			//信息栏
			$objPHPExcel->getActiveSheet()->setCellValue('A2', '序号');
			$objPHPExcel->getActiveSheet()->setCellValue('B2', '项目名称');
			$objPHPExcel->getActiveSheet()->setCellValue('C2', '获奖类别');
			$objPHPExcel->getActiveSheet()->setCellValue('D2', '获奖等级');
			$objPHPExcel->getActiveSheet()->setCellValue('E2', '获奖时间');
			$objPHPExcel->getActiveSheet()->setCellValue('F2', '获奖人员名单');

			// $this->load->model('award');
			// $i = 3;
			// $res = $this->award->getAward();
			// foreach($res as $item)
			// {
				// $name,$source,$level,$principal,$start,$end,$money,$currency,$contract,$credit,$type
				// $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $i-2);
				// $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $item->name);
				// $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $item->source);
				// $person_name = $this->db->where('id',$item->principal)->get('person')->row()->name;
				// $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $person_name);
				// $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $item->start);
				// $objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $item->end);
				// $objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $item->money);
				// $objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $currency);
				// $objPHPExcel->getActiveSheet()->setCellValue('I2', );
				// $objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $item->contract);
				// $objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $item->credit);
				// $objPHPExcel->getActiveSheet()->setCellValue('L2', '备注');

				// $i++;
			// }
		}

		private function do_work($objPHPExcel)
		{
			$msgWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'card_message'); //创建一个工作表
        	$objPHPExcel->addSheet($msgWorkSheet); //插入工作表
			$objPHPExcel->setActiveSheetIndex(5);
			// 设置工作薄名称
			$objPHPExcel->getActiveSheet()->setTitle("出版专著情况");
			// 设置默认字体和大小
			$objPHPExcel->getDefaultStyle()->getFont()->setName("宋体");
			$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

			// 标题栏
			$objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ICES研究中心2013年度 出版专著情况');

			//列宽度自适应
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

			//信息栏
			$objPHPExcel->getActiveSheet()->setCellValue('A2', '序号');
			$objPHPExcel->getActiveSheet()->setCellValue('B2', '专著名称');
			$objPHPExcel->getActiveSheet()->setCellValue('C2', '出版社名称');
			$objPHPExcel->getActiveSheet()->setCellValue('D2', '出版时间');
			$objPHPExcel->getActiveSheet()->setCellValue('E2', '著者名单');

			$this->load->model('work');
			$i = 3;
			$res = $this->work->getWork();
			foreach($res as $item)
			{
				//$name,$publisher,$publishdate,$personlist
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $i-2);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $item->name);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $item->publisher);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $item->publishdate);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $item->personlist);

				$i++;
			}
		}

		private function do_part($objPHPExcel)
		{
			$msgWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'card_message'); //创建一个工作表
        	$objPHPExcel->addSheet($msgWorkSheet); //插入工作表
			$objPHPExcel->setActiveSheetIndex(6);
			// 设置工作薄名称
			$objPHPExcel->getActiveSheet()->setTitle("学术团体(组织)兼职情况");
			// 设置默认字体和大小
			$objPHPExcel->getDefaultStyle()->getFont()->setName("宋体");
			$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

			// 标题栏
			$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ICES研究中心2013年度 学术团体兼职情况');

			//列宽度自适应
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

			//信息栏
			$objPHPExcel->getActiveSheet()->setCellValue('A2', '序号');
			$objPHPExcel->getActiveSheet()->setCellValue('B2', '学术团体(组织)名称');
			$objPHPExcel->getActiveSheet()->setCellValue('C2', '担任职务');
			$objPHPExcel->getActiveSheet()->setCellValue('D2', '任职开始时间');
			$objPHPExcel->getActiveSheet()->setCellValue('E2', '任职结束时间');
			$objPHPExcel->getActiveSheet()->setCellValue('F2', '兼职人员姓名');

			$this->load->model('part');
			$i = 3;
			$res = $this->part->getPart();
			foreach($res as $item)
			{
				// $number,$name,$duty,$start,$end,$which
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $i-2);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $item->name);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $item->duty);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $item->start);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $item->end);
				$person_name = $this->db->where('id',$item->id)->get('person')->row()->name;
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $person_name);

				$i++;
			}
		}

		private function do_learn($objPHPExcel)
		{
			$msgWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'card_message'); //创建一个工作表
        	$objPHPExcel->addSheet($msgWorkSheet); //插入工作表
			$objPHPExcel->setActiveSheetIndex(7);
			// 设置工作薄名称
			$objPHPExcel->getActiveSheet()->setTitle("国内外进修及学习情况");
			// 设置默认字体和大小
			$objPHPExcel->getDefaultStyle()->getFont()->setName("宋体");
			$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

			// 标题栏
			$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ICES研究中心2013年度 国内外进修及学习情况');

			//列宽度自适应
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

			//信息栏					
			$objPHPExcel->getActiveSheet()->setCellValue('A2', '序号');
			$objPHPExcel->getActiveSheet()->setCellValue('B2', '进修学习单位');
			$objPHPExcel->getActiveSheet()->setCellValue('C2', '进修学习内容');
			$objPHPExcel->getActiveSheet()->setCellValue('D2', '开始时间');
			$objPHPExcel->getActiveSheet()->setCellValue('E2', '结束时间');
			$objPHPExcel->getActiveSheet()->setCellValue('F2', '(进修及学习)人员姓名');

			//设置填充的样式和背景色
			// $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$objPHPExcel->getActiveSheet()->getStyle('A2:F2')->getFill()->getStartColor()->setARGB('00C0FFC0');

			$this->load->model('learn');
			$i = 3;
			$res = $this->learn->getLearn();
			foreach($res as $item)
			{
				// $institute,$content,$start,$end,$person
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $i-2);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $item->institute);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $item->content);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $item->start);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $item->end);
				$person_name = $this->db->where('id',$item->person)->get('person')->row()->name;
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $person_name);

				$i++;
			}
		}

		private function do_cooperation($objPHPExcel)
		{
			$msgWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'card_message'); //创建一个工作表
        	$objPHPExcel->addSheet($msgWorkSheet); //插入工作表
			$objPHPExcel->setActiveSheetIndex(8);
			// 设置工作薄名称
			$objPHPExcel->getActiveSheet()->setTitle("国际合作情况");
			// 设置默认字体和大小
			$objPHPExcel->getDefaultStyle()->getFont()->setName("宋体");
			$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

			// 标题栏
			$objPHPExcel->getActiveSheet()->mergeCells('A1:L1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ICES研究中心2013年度 国际合作情况');
			
			//列宽度自适应
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

			//信息栏					  
			$objPHPExcel->getActiveSheet()->setCellValue('A2', '序号');
			$objPHPExcel->getActiveSheet()->setCellValue('B2', '类别');
			$objPHPExcel->getActiveSheet()->setCellValue('C2', '出访/来访人员名单');
			$objPHPExcel->getActiveSheet()->setCellValue('D2', '人数');
			$objPHPExcel->getActiveSheet()->setCellValue('E2', '开始时间');
			$objPHPExcel->getActiveSheet()->setCellValue('F2', '结束时间');
			$objPHPExcel->getActiveSheet()->setCellValue('G2', '出访地/来访地');
			$objPHPExcel->getActiveSheet()->setCellValue('H2', '访问目的');
			$objPHPExcel->getActiveSheet()->setCellValue('I2', '报告名称');
			$objPHPExcel->getActiveSheet()->setCellValue('J2', '新闻报道链接');
			$objPHPExcel->getActiveSheet()->setCellValue('K2', '新闻报告保存否');
			$objPHPExcel->getActiveSheet()->setCellValue('L2', '照片保存否');
			
			$this->load->model('cooperation');
			$i = 3;
			$res = $this->cooperation->getCooperation();
			foreach($res as $item)
			{
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $i-2);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $item->category);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $item->list);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $item->number);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $item->start);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $item->end);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $item->place);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $item->purpose);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $item->report);
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $item->url);
				$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $item->news);
				$objPHPExcel->getActiveSheet()->setCellValue('L'.$i, $item->picture);

				$i++;
			}
		}

	}
?>