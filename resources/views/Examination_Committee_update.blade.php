<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>UPDATE ExaminationCommittee</h1>
<h3>{{$ExaminationCommittee->id}}</h3>

<form method="POST" action="{{route('update', ['id' => $ExaminationCommittee->id])}}">
    @csrf
    @method('PUT')

    <label for="committee_name">committee name:</label>
    <input type="text" value="{{$ExaminationCommittee->committee_name}}" name="committee_name" required>

    <div id="supervisorFields">
            <label for="Supervisor">Supervisor Name:</label>
            <input type="text" name="supervisors[]" required>
        </div>

        <button type="button" onclick="addSupervisorField()">Add Supervisor</button>
        <br>
  

    <button type="submit">UPDATE ExaminationCommittee</button>
</form>



<script>
    function addSupervisorField() {
        var supervisorFields = document.getElementById('supervisorFields');

        var label = document.createElement('label');
        label.setAttribute('for', 'Supervisor');
        label.innerText = 'Supervisor Name:';

        var input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('name', 'supervisors[]');
        input.setAttribute('required', true);

        supervisorFields.appendChild(document.createElement('br'));
        supervisorFields.appendChild(label);
        supervisorFields.appendChild(input);
    }
</script>
</body>
</html>