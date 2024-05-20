<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

  <div class="container mt-5">
      <h2>Filter Data</h2>

      <form method="post" action="filter_data.php">
          <div class="mb-3">
              <label for="searchType" class="form-label">Select Search Type:</label>
              <select class="form-select" id="searchType" name="searchType">
                  <option value="normal">Normal</option>
                  <option value="project">Project</option>
              </select>
          </div>

          <div class="mb-3">
              <label for="searchText" class="form-label">Enter Search Text:</label>
              <div class="input-group">
                  <span class="input-group-text" id="prefix">Prefix</span>
                  <input type="text" class="form-control" id="searchText" name="searchText">
              </div>
          </div>

          <div class="mb-3">
              <label for="filterOption" class="form-label">Select Filter Option:</label>
              <select class="form-select" id="filterOption" name="filterOption">
                  <option value="SName">Student Name</option>
                  <option value="Duration">Duration</option>
                  <option value="Serial">Serial No</option>
                  <option value="DateOfIssue">Date Of Issue</option>
                  <option value="Course">Course</option>
              </select>
          </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
function filterData() {
    var form = document.getElementById('filterForm');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('filteredData').innerHTML = xhr.responseText;
        }
    };

    xhr.open('POST', 'filter_data.php', true);
    xhr.send(formData);
}
</script>

</body>
</html>
