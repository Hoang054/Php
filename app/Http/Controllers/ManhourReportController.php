<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ManhourReportController extends Controller
{
    function index(){
        $user = 'HOANGTX';
        $UserName = DB::select("select DISTINCT left(surrogate_key, length(surrogate_key) - 3), save_name from m_user_screen_item where screen_url = 'ManhourReport' 
        and save_name <> '' and user_no = '$user'");
        $group = DB::select("select CONCAT(group_code,'[', group_name,' ', accounting_group_name,']'), group_code from m_group where del_flg = false");
        $theme = DB::select("select CONCAT(theme_no,'[', theme_name1,']'), theme_no from m_theme");
        return view('ManHourReport',compact('UserName', 'group', 'theme'));
    }
    function GetsGroupName(){
        $groups = DB::select("select CONCAT(group_code,'[', group_name,']') as groupName, group_code from m_group where del_flg = false");
        return response()->json($groups);
    }
    function GetsUserName($groupCode){
        $users = DB::select("select user_no, user_name from m_user where group_code = '$groupCode'");
        return response()->json($users);
    }
    function GetsWorkContent($themeNo){
        $workcontents = DB::select("select wc.work_contents_code as workCode, CONCAT(wc.work_contents_code,'[', wc.work_contents_code_name,']') as work_Content
         from m_theme as th join m_work_contents wc on th.work_contents_class = wc.work_contents_class where th.theme_no = '$themeNo' and wc.del_flg = false");
        return response()->json($workcontents);
    }
    function GetsThemeName(){
        $themes = DB::select("select CONCAT(theme_no,'[', theme_name1,']') as theme_Name, theme_no as ThemeCode from m_theme where del_flg = false");
        return response()->json($themes);
    }
    function AddTheme($id){
        $html = "<div class='form-group row themeadd' id='Theme_$id'>
                <label class='col-form-label col-md-2'></label>
                <div class='col-md-10'>
                    <div class='row align-items-center'>
                        <div class='col-md-4 input-group pl-0'>
                            <input type='text' class='form-control form-control-sm' placeholder='テーマ選択...' aria-label='...' aria-describedby='button-addon2' id='theme_$id' readonly>
                            <div class='input-group-append'>
                                <button type='button' id='button-addtheme_$id' class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#Modal_$id'><i class='fas fa-search'></i></button>
                            </div>
                        </div>
                        <div class='col-md-2 input-group pr-2'>
                            <select class='form-control form-control-sm' id='addWorkContent_$id'>
                            </select>
                        </div>
                        <div class='col-md-2 input-group'>
                            <input type='number' class='form-control form-control-sm' id='addWorkDetail_$id' placeholder='内容詳細...' aria-label='...' aria-describedby='button-addon2'  min='00' max='99'>
                        </div>
                        <div class='col-md-4 input-group pl-0'>
                            <i class='far fa-trash-alt' onclick='deleteTheme($id)'></i>
                        </div>
                    </div>
                </div>
            </div>";
        return ($html);
    }
    function GetManhourReport($surrogatekey){
        $userScreenSaves = DB::table('m_user_screen_item')->where('surrogate_key','like',"$surrogatekey%")->where('screen_url','ManhourReport')->get();
        return response()->json($userScreenSaves);
    }
    function CheckSave(Request $data){
        return ($data);
    }
    function CheckReport(Request $data){
        return ($data);
    }
}
