@extends('layout')
@section('content')
<link href="../resources/css/bootstrap.min.css" rel="stylesheet" />
<link href="../resources/css/datepicker.css" rel="stylesheet" />

<div class="row">

    <main role="main" class="container-fluid px-4">
        <div id="error">
        </div>
        <div class="h5 pt-1 pb-1 border-bottom">画面項目呼出・保存・クリア</div>

        <div class="form-group row">
            <label class="col-form-label col-md-2 text-right">呼出</label>
            <div class="col-md-10">
                <div class="col-md-4 input-group pl-0">
                    <select name="" id="userScreenName" onChange="changeCall()" class = "form-control form-control-sm">
                        <option value="">保存名...</option>
                        @foreach($UserName as $user)
                            <option value="{{$user->left}}">{{$user->save_name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-sm btn-outline-secondary mr-2" onclick="deleteUserScreenName()">削除</button>
                </div>
            </div>
            <label class="col-form-label col-md-2 text-right">保存</label>
            <div class="col-md-10">
                <div class="col-md-4 input-group pl-0">
                    <input type="text" class="form-control form-control-sm" value="" id="SaveName" />
                    <button class="btn btn-sm btn-outline-secondary mr-2" onclick="saveUserScreenName()">保存</button>
                </div>
            </div>
            <label class="col-form-label col-md-2 text-right">クリア</label>
            <div class="col-md-10">
                <div class="col-md-4 input-group pl-0">
                    <button class="btn btn-sm btn-outline-secondary mr-2" onclick="reset()">クリア</button>
                </div>
            </div>
        </div>

        <div class="h5 pt-1 pb-1 border-bottom">絞り込み条件</div>

        <div class="form-group row">
            <label class="col-form-label col-md-2 text-right">期間</label>
            <div class="col-md-2 p-0">
                <div class="input-group date">
                    <input type="text" class="form-control form-control-sm" id="fromDate" />
                    <span class="input-group-append" id="datepicker1">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </span>
                </div>
            </div>
            <div class="col-md-1 p-0 text-md-center"><span>～</span></div>
            <div class="col-md-2 p-0">
                <div class="input-group date">
                    <input type="text" class="form-control form-control-sm" id="toDate" />
                    <span class="input-group-append" id="datepicker2">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-md-2 text-right">所属</label>
            <div class="col-md-10">
                <div class="row align-items-center" id="addFirst">
                    <div class="col-md-4 input-group pl-0" style="margin-bottom: auto;">
                        <select class="form-control form-control-sm" id="GroupId1" onchange="GroupChange(1)">
                            <option></option>
                            @foreach($group as $Agroup)
                                <option value="{{$Agroup->group_code}}">{{$Agroup->concat}}</option>
                            @endforeach
                        </select>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="col-md-3 input-group pl-0">
                        <div class="countUser" id="addUserinGroup1" style="width: 100%"></div>
                        <div class="input-group pl-0 UserAdd" id="UserAdd1" hidden>
                            <button class="btn btn-sm btn-outline-secondary mr-2" data-toggle="collapse" data-target="#collapseOne2" 
                                    onclick="addUser(1)"><i class="fas fa-plus"></i> ユーザ追加</button>
                        </div>
                    </div>
                    <div class="col-md-4 pl-0" style="margin-top:-15px">
                        <div id="trashUser1"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row" id="btn_addUser" hidden>
            <div class="col-md-2"></div>
            <div class="col-md-10 p-0">
                <div class="row align-items-center">
                    <div class="col-md-4 input-group pl-0">
                    </div>
                    <div class="col-md-3 input-group pl-0">
                        <button class="btn btn-sm btn-outline-secondary mr-2" data-toggle="collapse" data-target="#collapseOne2" 
                                onclick="addUser()"><i class="fas fa-plus"></i> ユーザ追加</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="AddGroup"></div>

        <div class="form-group row" id="addGroup">
            <div class="col-md-2"></div>
            <div class="col-md-10 p-0">
                <button class="btn btn-sm btn-outline-secondary mr-2" data-toggle="collapse" data-target="#collapseOne2" 
                        onclick="addGroup()"><i class="fas fa-plus"></i> 所属追加</button>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-md-2 text-right">テーマ</label>
            <div class="col-md-10">
                <div class="row align-items-center">
                    <div class="col-md-4 input-group pl-0">
                        <input type="text" class="form-control form-control-sm" placeholder="テーマ選択..." aria-label="..." 
                               aria-describedby="button-addon2" id="theme_1" readonly="">
                        <div class="input-group-append">
                            <button type="button" id="button-addtheme_1" class="btn btn-sm btn-outline-secondary" data-toggle="modal"
                                    data-target="#Modal_1"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-2 input-group pr-2">
                        <select class="form-control form-control-sm" id="addWorkContent_1">
                        </select>
                    </div>
                    <div class="col-md-2 input-group">
                        <input type="number" class="form-control form-control-sm" id="addWorkDetail_1" placeholder="内容詳細..." 
                               aria-label="..." aria-describedby="button-addon2" min="00" max="99">
                    </div>
                    <div class="col-md-4 input-group pl-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select class="form-control form-control-sm" id="value1">
                            <option></option>
                            @foreach($theme as $Atheme)
                                <option value="{{$Atheme->theme_no}}">{{$Atheme->concat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="SaveTheme(1)">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="AddTheme"></div>


        <div class="form-group row" id="buttonAddTheme">
            <div class="col-md-2"></div>
            <div class="col-md-10 p-0">
                <button class="btn btn-sm btn-outline-secondary mr-2" onclick="addTheme()"><i class="fas fa-plus"></i> テーマ追加</button>
            </div>
        </div>

        <div class="h5 pt-1 pb-1 border-bottom">レイアウト設定</div>

        <div class="form-group row">
            <label class="col-form-label col-md-2 text-right">表示項目</label>
            <div class="col-md-10 p-0">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <p class="m-0">選択しない項目</p>
                        <select multiple style="height:200px; width:150px;" id="NotSelect">
                            <option value="affiliation">所属</option>
                            <option value="user">ユーザ</option>
                            <option value="theme">テーマ</option>
                            <option value="workcontent">作業内容</option>
                            <option value="detailworkcontent">作業内容詳細</option>
                            <option value="overalltotal">全体合計</option>
                            <option value="monthlytotal">月別合計</option>
                            <option value="dailytotal">日別合計</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <div class="mb-2"><button onclick="AddSelect()">追加 →</button></div>
                        <div class="mb-2"><button onclick="RemoveSelect()">← 解除</button></div>
                    </div>
                    <div class="col-auto">
                        <p class="m-0">選択された項目</p>
                        <select multiple style="height:200px; width:150px;" id="Select">
                        </select>
                    </div>
                    <div class="col-auto">
                        <div class="mb-2"><button onclick="selectUp()">↑</button></div>
                        <div class="mb-2"><button onclick="selectDown()">↓</button></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-md-2 text-right">サマリ行出力</label>
            <div class="col-md-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="isTotal1" name="isTotal" type="radio" class="custom-control-input" value="1" checked>
                    <label class="custom-control-label" for="isTotal1">出力する</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="isTotal" name="isTotal" type="radio" class="custom-control-input" value="0">
                    <label class="custom-control-label" for="isTotal">出力しない</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-md-2 text-right">CSV区切り文字</label>
            <div class="col-md-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="typeDelimiter1" name="typeDelimiter" type="radio" class="custom-control-input" value="1" checked>
                    <label class="custom-control-label" for="typeDelimiter1">カンマ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="typeDelimiter" name="typeDelimiter" type="radio" class="custom-control-input" value="0">
                    <label class="custom-control-label" for="typeDelimiter">タブ</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-md-2 text-right">CSVシングルクォーテーション付加</label>
            <div class="col-md-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="isSingleQuote1" name="isSingleQuote" type="radio" class="custom-control-input" value="1" checked>
                    <label class="custom-control-label" for="isSingleQuote1">しない</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="isSingleQuote" name="isSingleQuote" type="radio" class="custom-control-input" value="0">
                    <label class="custom-control-label" for="isSingleQuote">する</label>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center py-2">
            <button class="btn btn-outline-secondary" style="width:300px;" onclick="checkform()"><i class="fas fa-list"></i> 画面表示</button>
            <button class="btn btn-outline-secondary" style="width:300px;" onclick="outputCSV()">
                <i class="fas fa-file-download"></i> CSVダウンロード</button>
        </div>
    </main>

</div>
<div id="AddModal"></div>

@endsection
@section('script')
<script src="../resources/js/datepicker.js"></script>
<script src="../resources/js/ManhourReport.js"></script>
@endsection