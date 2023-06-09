<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Tracking Laporan SIAP AKPOL</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<style type="text/css">
  body {
  font-family: "Open Sans", sans-serif;
  font-size: 16px;
  box-sizing: border-box;
}

p {
  margin: 0;
}

button > * {
  pointer-events: none;
}

main {
  padding: 0 15px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: -60px;
}

@media screen and (min-width: 768px) {
  main {
    padding: 0 30px;
    margin-top: -60px;
  }
}

header {
  background: #4A00E0;
  background: linear-gradient(to top, #FFBE17 0%, #FFBE17 100%);
  padding: 40px 15px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

@media screen and (min-width: 768px) {
  header {
    padding: 80px 30px;
  }
}

header h1 {
  color: #fff;
  font-weight: 400;
  font-size: 2rem;
  margin: 0 0 30px 0;
}

header h4 {
  color: #fff;
  font-weight: 300;
  font-size: 1rem;
  margin: 0 0 30px 0;
  width: 75%;
  text-align: justify;
}

@media screen and (min-width: 768px) {
  header h1 {
    font-size: 3rem;
  }

  header h4 {
    font-size: 1.6rem;
    width: 650px;
  }
}

form {
  width: 75%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

@media screen and (min-width: 768px) {
  form {
    max-width: 650px;
    flex-direction: row;
  }
}

input[type="text"] {
  width: 100%;
  border-color: transparent;
  padding: 15px 20px;
  border-radius: 30px;
  margin-bottom: 20px;
}

@media screen and (min-width: 768px) {
  input[type="text"] {
    margin-bottom: 0;
    margin-right: 20px;
    padding: 20px 30px;
  }
}

input[type="submit"] {
  border-color: transparent;
  border-style: solid;
  border-width: 2px;
  width: 120px;
  background: #f6f6f63d;
  color: #fff;
  border-radius: 30px;
  padding: 15px;
  text-transform: uppercase;
  font-weight: 700;
  transition: all 0.3s;
}

input[type="submit"]:hover {
  background: #0b000040;
}

@media screen and (min-width: 768px) {
  input[type="submit"] {
    width: 150px;
    padding: 20px;
  }
}

.projects {
  list-style: none;
  padding: 0;
  width: 100%;
}

@media screen and (min-width: 768px) {
  .projects {
    max-width: 80%;
  }
}

@media screen and (min-width: 991px) {
  .projects {
    max-width: 650px;
    /*max-width: 60%;*/
  }
}

.projects  {
  box-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
  border-radius: 15px;
/*  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: relative;
  margin-bottom: 30px;
  background: white;*/
  margin-bottom: 40px;
}

.projects li h2 {
  font-size: 1.125rem;
  color: #4A4A4A;
}

@media screen and (min-width: 768px) {
  .projects li h2 {
    font-size: 1.313rem;
    margin-right: auto;
  }
}

@media screen and (min-width: 768px) {
  .projects {
    background: white;
    padding: 25px;
    color: #515B60;
    /*flex-direction: row;*/
    /*justify-content: flex-end;*/
  }
}

.timer {
  text-align: center;
  color: #4A4A4A;
  margin-bottom: 20px;
}

.timer-label {
  margin-bottom: 5px;
}

.timer-text {
  font-size: 1.5rem;
  font-weight: 700;
}

@media screen and (min-width: 768px) {
  .timer-text {
    font-size: 1.875rem;
  }
}

.btn {
  padding: 13px;
  width: 120px;
  border-radius: 60px;
  text-transform: uppercase;
  color: #fff;
  border-color: transparent;
  border-style: solid;
  border-width: 2px;
  font-weight: 700;
  font-size: 1.125rem;
  transition: background 0.3s, transform 0.5s;
}

.btn:hover {
  background: transparent;
}

.start {
  background: #21D324;
}

.start:hover {
  color: #21D324;
  border-color: #21D324;
  border-style: solid;
}

.stop {
  background: #D00202;
}

.stop:hover {
  color: #D00202;
  border-color: #D00202;
  border-style: solid;
}

.delete-btn {
  background: #D00202;
  border-radius: 50%;
  width: 42px;
  height: 42px;
  border: 2px solid #D00202;
  opacity: 1;
  color: #fff;
  display: flex;
  justify-content: center;
  align-content: center;
  transition: background 0.3s, opacity 0.3s, transform 0.5s;
}

.delete-btn i {
  font-size: 1.5rem;
}

.delete-btn:hover {
  color: #D00202;
  background: transparent;
}


.projects li:hover .delete-btn,
.projects li:hover .timer,
.projects li:hover .btn {
  opacity: 1;
}


.projects input {
  width: 100%;
  padding: 0.5rem;
  font-size: 1.125rem;
  color: #4A4A4A;
  margin-bottom: 20px;
  border-radius: 10px;
  border: 1px solid #a2a2a2;
}

@media screen and (min-width: 768px) {
  .projects input {
    width: 50%;
    font-size: 1.313rem;
    margin-bottom: 0;
    margin-right: auto;
  }
}

  .kd-aduan{
    color: #263238;
    margin-bottom: 15px;
  }

  .ringkasan-kejadian {
    margin-top: 20px;
    margin-bottom: 10px;
    color: #98A2B3;
  }

  .isi-ringkasan-kejadian {
    color: #515B60;
  }

  hr{
    height: 1px;
    background-color: #d3dce6;
    border: none;
  }

  .order-track {
  /*margin-top: 2rem;*/
  padding: 0 1rem;
  /*border-top: 1px dashed #2c3e50;*/
  padding-top: .5rem;
  display: flex;
  flex-direction: column;
}
.order-track-step {
  display: flex;
  height: 4rem;
}
.order-track-step:last-child {
  overflow: hidden;
  height: 4rem;
}
.order-track-step:last-child .order-track-status span:last-of-type {
  display: none;
}
.order-track-status {
  margin-right: 1.5rem;
  position: relative;
}
.order-track-status-dot {
  display: block;
  width: 1rem;
  height: 1rem;
  border-radius: 50%;
  background: #FFBE17;
}
.order-track-status-line {
  display: block;
  margin: 0 auto;
  width: 2px;
  height: 4rem;
  background: #FFBE17;
}
.order-track-text-stat {
  /*font-size: 1.3rem;*/
  /*font-weight: 500;*/
  margin-bottom: 3px;
}
/*.order-track-text-sub {
  font-size: 1rem;
  font-weight: 300;
}*/

.order-track {
  transition: all 0.3s height 0.3s;
  transform-origin: top center;
}
</style>

</head>
<body>
<header role="banner">
    <h1>PANIC BUTTON TRACKER</h1>
    <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
    <form class="project-form" autocomplete="off" >
        <input type="text" name="project" placeholder="Masukan Kode Aduan">
        <input type="submit" value="Cari">
    </form>
</header>
<main role="main">
  <div class="projects">
    <div class="kd-aduan">Kode Aduan : 220622019</div>
    <hr>
    <div>
      <div class="ringkasan-kejadian">Ringkasan Kejadian</div>
      <div class="isi-ringkasan-kejadian">Butuh ambulan secepatnya</div>
    </div>

    <div class="alamat">
      <div class="ringkasan-kejadian">Alamat</div>
      <div class="isi-ringkasan-kejadian">Jalan Setiabudi 203 - Sate Padang Takana Juo, Semarang, Jawa Tengah, ID</div>
    </div>

    <div class="penanganan">
      <div class="ringkasan-kejadian">Proses Penanganan</div>
      <div class="isi-ringkasan-kejadian">
          <div class="order-track">
            <div class="order-track-step">
              <div class="order-track-status">
                <span class="order-track-status-dot"></span>
                <span class="order-track-status-line"></span>
              </div>
              <div class="order-track-text">
                <p class="order-track-text-stat">Order Received</p>
                <span class="order-track-text-sub">21st November, 2019</span>
              </div>
            </div>
            <div class="order-track-step">
              <div class="order-track-status">
                <span class="order-track-status-dot"></span>
                <span class="order-track-status-line"></span>
              </div>
              <div class="order-track-text">
                <p class="order-track-text-stat">Order Processed</p>
                <span class="order-track-text-sub">21st November, 2019</span>
              </div>
            </div>
            <div class="order-track-step">
              <div class="order-track-status">
                <span class="order-track-status-dot"></span>
                <span class="order-track-status-line"></span>
              </div>
              <div class="order-track-text">
                <p class="order-track-text-stat">Manufracturing In Progress</p>
                <span class="order-track-text-sub">21st November, 2019</span>
              </div>
            </div>
            <div class="order-track-step">
              <div class="order-track-status">
                <span class="order-track-status-dot"></span>
                <span class="order-track-status-line"></span>
              </div>
              <div class="order-track-text">
                <p class="order-track-text-stat">Order Dispatched</p>
                <span class="order-track-text-sub">21st November, 2019</span>
              </div>
            </div>
            <div class="order-track-step">
              <div class="order-track-status">
                <span class="order-track-status-dot"></span>
                <span class="order-track-status-line"></span>
              </div>
              <div class="order-track-text">
                <p class="order-track-text-stat">Order Deliverd</p>
                <span class="order-track-text-sub">21st November, 2019</span>
              </div>
            </div>
          </div>
      </div>
    </div>
    
  </div>
<!--     <ul class="projects">
      <li id="project-0">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15840.05548282841!2d110.418191!3d-7.0076491079225685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4538917ff1%3A0x5a46ac31ed0f0e3d!2sToko%20Raja%20Listrik!5e0!3m2!1sen!2sid!4v1655961710685!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </li>
    </ul> -->
</main>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/dompurify/1.0.7/purify.min.js'></script>
  <!-- <script type="text/javascript">
    // Data controller
const dataController = (function() {

    // Project class
    class Project {
        constructor(id, title) {
            this.id = id;
            this.title = title;
        }
    }

    // Project data
    const projects = {
        allProjects: []
    };

    // Publicly accessible
    return {

        // Add project
        addProject: function(title) {

            // Create ID
            let ID;
            if (projects.allProjects.length > 0) {
                ID = projects.allProjects[projects.allProjects.length - 1].id + 1;
            } else {
                ID = 0;
            }

            // Create a new instance
            const newProject = new Project(ID, title);

            // Add the project to the project data
            projects.allProjects.push(newProject);

            // Return the new project
            return newProject;

        },

        // Update project title in data structure
        updateTitle: function(newTitle, ID) {

            // Find the object with matching ID
            const projectToUpdate = projects.allProjects.find(project => project.id === ID);
            
            // Update the title
            projectToUpdate.title = newTitle;

        },

        // Delete a project from data structure
        deleteData: function(ID) {

            const currentProject = projects.allProjects.map(current => current.id);
            const index = currentProject.indexOf(ID);
            if (index !== -1) {
                projects.allProjects.splice(index, 1);
            }

        },

        // Testing
        testing: function() {
           // console.log(projects);
        }

    };
    
})();

// UI controller
const UIController = (function() {

    // Variables
    let intervalID;

    // Get the element classes
    const DOMstrings = {
        projectForm: '.project-form',
        inputValue: 'input[type="text"]',
        projectList: '.projects',
        hoursSpan: '.hours',
        minutesSpan: '.minutes',
        secondsSpan: '.seconds'
    };

    // Create variables from DOMstrings
    const {projectForm, inputValue, projectList, hoursSpan, minutesSpan, secondsSpan} = DOMstrings;

    // Publicly accessible
    return {

        // Get input value
        getInput: function() {
            return document.querySelector(inputValue);
        },

        // Add project to UI
        addProjectToUI: function(obj) {

            // Create markup
            const html = `
            <li id="project-${obj.id}">
                <h2>${obj.title}</h2>
                <div class="timer">
                    <p class="timer-label">Total Time Spent</p>
                    <p class="timer-text"><span class="hours">00</span>:<span class="minutes">00</span>:<span class="seconds">00</span></p>
                </div>
                <button class="btn start">Start</button>
                <button class="delete-btn"><i class="fa fa-times"></i></button>
            </li>
            `;

            // Insert the HTML into the DOM
            document.querySelector(projectList).insertAdjacentHTML('beforeend', html);

        },

        // Clear field
        clearField: function() {
            const input = document.querySelector(inputValue);
            input.value = '';
        },

        // Start the timer
        startTimer: function(event) {

            const target = event.target.previousElementSibling.lastElementChild;
            const seconds = target.querySelector(secondsSpan);
            const minutes = target.querySelector(minutesSpan);
            const hours = target.querySelector(hoursSpan); 

            let sec = 0;
            intervalID = setInterval(function() {
                sec++;
                seconds.textContent = (`0${sec % 60}`).substr(-2);
                minutes.textContent = (`0${(parseInt(sec / 60)) % 60}`).substr(-2);
                hours.textContent = (`0${parseInt(sec / 3600)}`).substr(-2);
            }, 1000);

            // Add interval ID to event target as an attribute
            target.setAttribute('timer-id', intervalID);

        },

        // Stop the timer
        stopTimer: function(event) {
            const target = event.target.previousElementSibling.lastElementChild;
            clearInterval(target.getAttribute('timer-id'));
        },

        // Update project name in UI
        edit: function(event) {
            
            const input = document.createElement('input');
            const title = event.target;
            const parent = title.parentNode;
            input.value = title.textContent;
            parent.insertBefore(input, title);
            parent.removeChild(title);

        },

        // Save the project title in UI
        save: function(event) {

            const title = document.createElement('h2');
            const input = event.target;
            const parent = input.parentNode;
            title.textContent = input.value;
            parent.insertBefore(title, input);
            parent.removeChild(input);
            return title.textContent;

        },

        // Delete the project in the UI
        delete: function(projectID) {
            const projectToDelete = document.getElementById(projectID);
            projectToDelete.parentNode.removeChild(projectToDelete);
        },

        // Make the DOMstrings public
        getDOMstrings: function() {
            return DOMstrings;
        }

    };
    
})();

// Global app controller
const controller = (function(dataCtrl, UICtrl) {

    // Event listeners
    const setupEventListeners = function() {

        // Get the DOMstrings
        const DOM = UICtrl.getDOMstrings();

        // When the form is submitted
        const form = document.querySelector(DOM.projectForm);
        form.addEventListener('submit', ctrlAddProject);

        const projects = document.querySelector(DOM.projectList);

        projects.addEventListener('click', function(event) {

            const target = event.target;

            // When the start button is clicked
            if (target.className === 'btn start' || target.className === 'btn start stop') {
                timer(event);
            }

            // When the project title is clicked
            if (target.tagName === 'H2') {
                editTitle(event);
            }

            // When the delete button is clicked
            if (target.className === 'delete-btn') {
                deleteProject(event);
            }

        });

        // When the enter key is pressed
        projects.addEventListener('keypress', function(event) {
            if (event.keyCode === 13 || event.which === 13) {
                saveTitle(event);
            }
        });

    };

    // Add new project
    const ctrlAddProject = function(event) {

        // Prevent default behavior
        event.preventDefault();

        // Get and sanitize the input
        const dirty = UICtrl.getInput().value;
        const clean = DOMPurify.sanitize(dirty);

        // If the input is not empty
        if (clean !== '') {
            
            // Add the project to the data controller
            const newProject = dataCtrl.addProject(clean);

            // Add the project to the UI
            UICtrl.addProjectToUI(newProject);

            // Clear the input field
            UICtrl.clearField();
        }

    };

    // Timer
    const timer = function(event) {

        const target = event.target;

        // Toggle the button color
        target.classList.toggle('stop');

        // If the button's text is start
        if (target.textContent === 'Start') {

            target.textContent = 'Stop';
            UICtrl.startTimer(event);
    
        // If the button's text is stop
        } else if (target.textContent === 'Stop') {

            target.textContent = 'Start';
            UICtrl.stopTimer(event);

        }

    };

    // Edit the project title
    const editTitle = function(event) {
        UICtrl.edit(event);
    };

    // Save the project title
    const saveTitle = function(event) {

        const ID = parseInt(event.target.parentNode.id.slice(8));

        // Update the project title in the UI
        const newTitle = UICtrl.save(event);

        // Update the project title in the data structure
        dataCtrl.updateTitle(newTitle, ID);

    };

    // Delete project
    const deleteProject = function(event) {
        const target = event.target;
        const projectID = target.parentNode.id;
        const ID = parseInt(target.parentNode.id.slice(8));

        if (projectID) {

            // Delete the project from the data structure
            dataCtrl.deleteData(ID);

            // Delete the item from the UI
            UICtrl.delete(projectID);
            
        }
    };

    // Publicly accessible
    return {
        
        // Initialization
        init: function() {
           // console.log('Application has started');
            setupEventListeners();
        }

    };
    
})(dataController, UIController);

// Initialize
controller.init();
  </script> -->

</body>
</html>