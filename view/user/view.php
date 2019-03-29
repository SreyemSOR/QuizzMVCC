<form method='post' action="../user/view.php">
            <input type="submit" value="manage" name="Manage User" class=" pull-right btn btn-success">
    </form>

<form method='post' action="index.php?action=logout">
            <input type="submit" value="Logout" name="but_logout" class="btn btn-danger">
    </form>
   
<div id="users">
<div class="col-md-12">

    <div class="pull-left">
        <input class="search" placeholder="Search" />
    </div>
    
    <div class="pull-right">
        <a href="index.php?action=add"><i class="glyphicon glyphicon-plus-sign" style="font-size:20px;"></i></a> &nbsp;
    </div>
</div>
<form action="employee.php" method="POST">
    <table class="table-bordered col-md-12">
        <th class="sort text-center">ID</th>
        <th class="sort text-center" data-sort="fname">Student Name</th>
        <th class="sort text-center" data-sort="title">Title</th>
        <th class="sort text-center" data-sort="age">Age</th>
        <th class="sort text-center" data-sort="years">YearsOfServices</th>
        <th class="sort text-center" data-sort="salary">Salary</th>
        <th class="sort text-center" data-sort="perk">Perk</th>
        <th class="sort text-center" data-sort="email">Email</th>
        <th class="sort text-center" data-sort="depart">DepartementID</th>
        <th class="sort text-center">Action</th>
        <!-- IMPORTANT, class="list" have to be at tbody -->
        
        <tbody class="list">
        <?php
       if($data['employee_data'] !=""){
        //id started from number 1   we are assign
        $i = 1;
        foreach($data['employee_data'] as $row){

            ?>
            <tr>
                 <td class="text-center id"><?php echo $i;?></td>
                 <td class="text-center fname"><?php echo $row['firstname'].''.$row['lastname'];?></td>
                 <td class="text-center title"><?php echo $row['title'];?></td>
                 <td class="text-center age"><?php echo $row['age'];?></td>
                 <td class="text-center years"><?php echo $row['yearofservice'];?></td>
                 <td class="text-center salary"><?php echo $row['salary'];?></td>
                 <td class="text-center perk"><?php echo $row['perks'];?></td>
                 <td class="text-center email"><?php echo $row['email'];?></td>
                 <td class="text-center depart"><?php echo $row['departmentid'];?></td>
                 <td class="text-center" >
                 <a href="index.php?action=view&id=<?php echo $row['id'];?> "><i class="glyphicon glyphicon-eye-open" style="color:green;margin-right:89px; "></i></a> &nbsp;
                 <a href="index.php?action=edit&id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-edit" style="color:blue; margin-right:12px;"></i></a>&nbsp;
                 <a href="index.php?action=delete&id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-trash" style="color:red; margin-right:23px; "></i></a> 
                 </td>
            </tr>
             <?php 
             $i++;
        }

        }else{
            echo "<tr><td coslspan='6> No record found..!</td><t/r>";
        }
      
   ?>
                               
</tbody>

    </table>
</form>

</div>

<script>
var options = {
    valueNames: ['id', 'fname', 'age', 'salary']
};

var userList = new List('users', options);
</script>
