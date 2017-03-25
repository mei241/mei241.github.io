<?php
include("inc/data.php");
include("inc/functions.php");
$pageTitle = "Full Catalog";
$section = null;

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  if (isset($catalog[$id])) {
    $item = $catalog[$id];
  }
}

if (!isset($item)) {
  header("location:catalog.php");
  exit;
}

$pageTitle = $item["title"];
$section = null;

include("inc/header.php"); ?>

<div class="section page">
  <div class="wrapper">
    <div class="breadcrumbs">
      <a href="catalog.php"> Full Catalog</a>
      &gt; <a href="catalog.php?cat=<?php echo strtolower($item["category"]); ?>">
      <?php echo $item["category"]; ?></a>
      &gt; <?php echo $item["title"]; ?>
    </div>
    <div class="media-picture">
      <span>
        <img src="<?php echo $item["img"]; ?>" alt="<?php echo $item["title"]; ?>" />
      </span>
    </div>
    <div class="media-details">
      <h1><?pho echo $item["title"]; ?></h1>
      <table>
        <tr>
          <th>Category</th>
          <th><?php echo $item["category"]; ?></th>
        </tr>
        <tr>
          <th>Genre</th>
          <th><?php echo $item["genre"]; ?></th>
        </tr>
        <tr>
          <th>Format</th>
          <th><?php echo $item["format"]; ?></th>
        </tr>
        <tr>
          <th>Year</th>
          <th><?php echo $item["year"]; ?></th>
        </tr>
        <?php if (strtolower($item["category"]) == "books") { ?>
          <tr>
            <th>Authors</th>
            <th><?php echo  implode(", ",$item["authors"]); ?></th>
          </tr>
          <tr>
            <th>Publisher</th>
            <th><?php echo $item["publisher"]; ?></th>
          </tr>
          <tr>
            <th>ISBN</th>
            <th><?php echo $item["isbn"]; ?></th>
          </tr>
        <?php } else if (strtolower($item["category"]) == "movies") { ?>
          <tr>
            <th>Director</th>
            <th><?php echo $item["director"]; ?></th>
          </tr>
          <tr>
            <th>Writers</th>
            <th><?php echo  implode(", ",$item["writers"]); ?></th>
          </tr>
          <tr>
            <th>Stars</th>
            <th><?php echo  implode(", ",$item["stars"]); ?></th>
          </tr>
        <?php } else if (strtolower($item["category"]) == "music") { ?>
          <tr>
            <th>Artist</th>
            <th><?php echo $item["artist"]; ?></th>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>