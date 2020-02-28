<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create/Edit lecture</h4>
            <div class="row">
                <div class="alert alert-dismissible hide fade in ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong></strong><span class="message"></span>
                </div>
            </div>
            <div class="basic-form">
                <form name="lecture" id="lecture">
                <?php  
                    $this->db->select('l.r_k, l.val_id, l.val_dsc')->from('t_wb_lov l');
                    $this->db->where("l.def_id LIKE '%QST-TP%'");
                    $questionTypes = $this->db->get();
                    // echo isset($lecture->r_k)? "<input type='hidden' name='r_k' value='$lecture->r_k' />":'';
                ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Choose Question</label>
                            <select  class="form-control" id="questionType" name='questionType'>
                                <option value=''>Select Question Type</option>";
                                <?php
                                if($questionTypes->num_rows() > 0){
                                    foreach($questionTypes->result() as $row){
                                        echo "<option data-type='$row->val_id' value='".$row->r_k."'>".$row->val_dsc."</option>";
                                        // echo "<option data-link='$row->link' value='".$row->r_k."'".($lecture->par_id == $row->r_k?'selected="selected"':'').">".$row->val_dsc."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Content</label>
                            <span class="error text-danger"></span>
                            <div class="summernote" id="content"></div>
                        </div>
                    </div>
                    <hr />
                    <fieldset class="answer-panel MCSA MCMA d-none">
                        <legend >
                            <i class="far fa-2x fa-plus-square float-right text-primary cursor-pointer "></i>
                            Add Answer
                        </legend>
                        <div class="row d-none answer" data-ng-repeat="answer in qdCtrl.question.answers">
                            <div class="col-sm-12" style="margin-top: 10px;">
                                Option <span class="length">1</span>.) <br />Select as answer
                                <label class="switch-light switch-ios d-none MCMA" style="width: 100px">
                                    <input type="checkbox" data-ng-model="answer.exm_qst_vld" />
                                    <span><span>Wrong</span><span>Correct</span><a></a></span>
                                </label>
                                <label class="switch switch-sm d-none MCSA">
                                    <input type="radio" name="exm_qst_vld" ng-model="answer.exm_qst_vld" ng-checked="answer.exm_qst_vld" ng-change="qdCtrl.changeAnswer(answer)" ng-value="true" />
                                    <span><i class="handle"></i></span>
                                </label>
                                <div class="summernote" id="content"></div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="answer-panel MTC d-none">
                        <legend >
                            <i class="fa fa-2x fa-plus-square-o pull-right text-primary cursor-pointer" data-ng-click="qdCtrl.addAnswer()"></i>
                            Add Match
                        </legend>
                        <div class="row" data-ng-repeat="answer in qdCtrl.question.answers">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" data-ng-model="answer.exm_qst_ans" placeholder="Enter an Answer">
                                    </div>
                                    <div class="col-sm-1 text-center">=</div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" data-ng-model="answer.exm_qst_vld" placeholder="Correct Match">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="answer-panel SA d-none">
                        <legend >
                            Answer in one or two words (comma separated for multiple possibilities.) Not case sensitive
                        </legend>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" data-ng-model="qdCtrl.question.answers[0].exm_qst_ans" placeholder="Enter answer(s)">
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-dark">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>