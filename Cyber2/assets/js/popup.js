function show_logout() {
    event.preventDefault();
    document.getElementById("logout_trigger").style.display = "block";
  }

  function hide_logout() {
    document.getElementById("logout_trigger").style.display = "none";
  }

  function show_help() {
    event.preventDefault();
    document.getElementById("help_trigger").style.display = "block";
  }

  function hide_help() {
    document.getElementById("help_trigger").style.display = "none";
  }

  
  function show_addgame() {
    event.preventDefault();
    document.getElementById("addgame_trigger").style.display = "block";
  }

  function hide_addgame() {
    document.getElementById("addgame_trigger").style.display = "none";
  }