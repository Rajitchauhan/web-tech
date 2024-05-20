<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select box</title>
    <style>
        #select , #subSelect , #duration , #secondSelect{
            text-align: center;
            font-size: 30px;
            margin-left: 20%;
            padding : 10px 20px 10px 20px;
        }
        #userInput{
            font-size: 20px;
            padding : 10px 20px 10px 20px;
        }
    </style>

    <script>

        function showOption() {
            let selectOptions = document.querySelector('#select').value;
            let inputBox = document.getElementById('inputBox');

            let dateRangeOption = document.getElementById('dateRangeOption');

            let subSelect = document.getElementById('subSelect');

            let duration = document.getElementById('duration');

            let secondSelect = document.getElementById('secondSelect');

            inputBox.style.display = 'none';
            dateRangeOption.style.display = 'none';
            subSelect.style.display = 'none';
            duration.style.display = 'none';

            secondSelect.style.display = 'none';

            console.log(selectOptions);
            switch(selectOptions){
                case 'SName':
                    console.log('this is options for student data');
                    inputBox.style.display = 'block';
                    userInput.value = '';
                    userInput.placeholder = "Type name here..";
                    break;
                case 'Duration':
                    console.log('this is options 2');
                    duration.style.display = 'block';
                    inputBox.style.display = 'block';
                    userInput.value = '';
                    userInput.placeholder = "Type Days/Months here..";
                    break;
                case 'Serial':
                    console.log('this is options 3');
                    subSelect.style.display = 'block';
                    break;
                case 'CertificateCompletion':
                    console.log('this is options 4');
                    dateRangeOption.style.display = 'block';
                    break;
                case 'Course':
                    console.log('this is for course');
                    secondSelect.style.display = 'block';
                    dynamicSelect();
                    break;
                default :
                    console.log('This is default');
                    break;
            }

       }

       function dynamicSelect(){
          let secondSelect =  document.getElementById('secondSelect');
          secondSelect.innerHTML = "";

          let courses = <?php echo json_encode(getSelect());  ?>;

          console.log(`This is data from php array ${courses}`);

          loadOptions(secondSelect , courses);
       }

       function loadOptions(selectionBox, data) {
           for (var i = 0; i < data.length; i++) {
               var option = document.createElement('option');
               option.value = data[i].courseID; // Assuming each course has a unique ID
               option.text = data[i].courseName;
               selectionBox.add(option);
           }
       }

       function addPrefix(){
        let subSelect = document.getElementById('subSelect').value;

        inputBox.style.display = 'block';

        switch (subSelect) {

            case 'normal':
                console.log('this is for normal');
                userInput.value = 'EGA';
                break;
            case 'project':
                console.log('this is for project');
                userInput.value = 'EGAP';
                break;

            default:
                console.log('this is default');
                userInput.value = '';
                break;
        }

       }



    </script>


</head>
<body>
    <center><h1>Play with select option using js</h1></center>

    <select name="" id="select" onchange="showOption();">
        <option value="1">Select Options</option>
        <option value="SName">Student Name</option>
        <option value="Duration">Duration</option>
        <option value="Serial">Serial No</option>
        <option value="CertificateCompletion">Certificate Completion</option>
        <option value="Course">Course</option>
    </select>

    <br><br>

    <select name="" style="display: none;" id="subSelect" onchange="addPrefix();">
        <option value="1">Select Options</option>
        <option value="normal">Normal</option>
        <option value="project">Project</option>
    </select>

    <select name="" style="display: none;" id="duration" >
        <option value="1">Select Options</option>
        <option value="day">Days</option>
        <option value="month">Months</option>
    </select>

    <br><br>

    <div id="inputBox" style="display: none; margin-left: 15%;  font-size: 20px;">
        <label for="userInput" class="form-label">Enter Value:</label>
        <input type="text" class="form-control" id="userInput" name="userInput" placeholder="Enter Student name">
    </div>

    <div id="dateRangeOption" style="display: none;">
        <label for="startDate" class="form-label">Start Date:</label>
        <input type="date" class="form-control" id="startDate" name="startDate">
        <label for="endDate" class="form-label">End Date:</label>
        <input type="date" class="form-control" id="endDate" name="endDate">
    </div>



    <div id="dynamicSelect">
      <select class="" id="secondSelect" style="display : none ;" name="">

      </select>
    </div>


    <?php
    // Sample PHP function to fetch courses for Option 1 from the database
    function getSelect() {
        // Connect to your database (replace these values with your actual database credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sample query to fetch courses for Option 1
        $sql = "SELECT courseName FROM course ";
        $result = $conn->query($sql);

        $courses = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $courses[] = $row;
            }
        }

        $conn->close();

        return $courses;
    } ?>
</body>
</html>
