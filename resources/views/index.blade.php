<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<style>
  /* .b {
    border: 1px solid black;
  }
  .grid-container {
  display: grid;
  grid-template-columns: 200px 1fr;
  grid-template-rows: 1fr;
  gap: 0px 0px;
  grid-template-areas:
    "sidebar content";
}
.content { grid-area: content; }
.sidebar { grid-area: sidebar; } */


.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 100px 1fr 1fr 100px;
  gap: 20px 20px;
  grid-template-areas:
    "groups groups-name groups-name"
    "groups table table"
    "groups table table"
    "pag-group pag-table pag-table";
}
/* .table { grid-area: table; }
.groups-name { grid-area: groups-name; }
.groups { grid-area: groups; }
.pag-group { grid-area: pag-group; }
.pag-table { grid-area: pag-table; } */
</style>
<body>
  <div class="container-fluid">
    <div class="grid-container">

      <div class="sidebar b">
        sidebar
      </div>
      <div class="content b">
        <div class="grid-container">
          <div class="table"></div>
          <div class="groups-name"></div>
          <div class="groups"></div>
          <div class="pag-group"></div>
          <div class="pag-table"></div>
        </div>
      </div>

    </div>

  </div>
</body>
</html>
