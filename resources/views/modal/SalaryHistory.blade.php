<style>

 .leaveStyle{
  position : relative;
  left : 10px;
  margin-bottom : 12px;
 }

 #message {
   position :relative;
   font-size : 20px;
 }
  .redborder{border:1px solid red;}
   #loader-ajax2 {
      display:    none;
      position:   fixed;
      z-index:    1000;
      top:        0;
      left:       0;
      height:     100%;
      width:      100%;
      background: rgba( 255, 255, 255, .8 ) 
            url('http://zaradevelopment.com/els/assets/images/loading_bar.gif') 
            50% 50% 
            no-repeat;
    }
</style>
<div  class="modal custom-modal fade" role="dialog" id="salaryhistory">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: auto!important; margin-left: -30%;">
      <div class="modal-header">
          <h5 class="modal-title">Update Record - {{$task[0]->S_id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">

        <table class="table text-nowrap datatable-responsive-column-controlled" id ="SalaryData" style="width:100%;"> 
            <thead> 
              <tr>
              <th>Sno.</th> 
              <th>Batch id</th>
              <th>Name</th>
              <th>Bank Account No</th>
              <th>Salary</th>
              <th>Fund</th>
              <th>Salary Comments</th>
              <th>Date</th> 
              @if(session()->get('role') <= 2)
              <th>Edit</th>
              @endif
              
              </tr>
            </thead>
            <tbody >
             
             @foreach($task as $tasks)
            <tr>
              <td>{{$tasks->S_id}}</td>
              <td>{{$tasks->EMP_BADGE_ID}}</td>
              <td>{{$tasks->Name}}</td>
              <td>{{$tasks->BankAccountNo}}</td>
              <td>{{$tasks->Salary}}</td>
              <td>{{$tasks->fund}}</td>
              <td>{{$tasks->Salary_Comment}}</td>
              <td>{{$tasks->Date}}</td>
              <td><button type="button" onclick="getedit('{{$tasks->S_id}}')" class="btn btn-success btn-xs btnManage"><i class="fa fa-pencil "></i></button></td>
             
            </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>