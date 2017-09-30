var app = {};
ons.ready(function () {
  ons.createElement('action-sheet1.html', { append: true })
    .then(function (sheet) {
      app.showFromTemplate = sheet.show.bind(sheet);
      app.hideFromTemplate = sheet.hide.bind(sheet);
    });
});

var app2 = {};
ons.ready(function () {
  ons.createElement('action-sheet2.html', { append: true })
    .then(function (sheet) {
      app2.showFromTemplate = sheet.show.bind(sheet2);
      app2.hideFromTemplate = sheet.hide.bind(sheet2);
    });
    
  
});

var app3 = {};
ons.ready(function () {
  ons.createElement('action-sheet3.html', { append: true })
    .then(function (sheet) {
      app3.showFromTemplate = sheet.show.bind(sheet3);
            app3.hideFromTemplate = sheet.hide.bind(sheet3);
    });
 
});

var app4 = {};
ons.ready(function () {
  ons.createElement('action-sheet4.html', { append: true })
    .then(function (sheet) {
      app4.showFromTemplate = sheet.show.bind(sheet4);
      app4.hideFromTemplate = sheet.hide.bind(sheet4);
    });
 
});

var app5 = {};
  ons.ready(function () {
  ons.createElement('action-sheet5.html', { append: true })
    .then(function (sheet) {
      app5.showFromTemplate = sheet.show.bind(sheet5);
      app5.hideFromTemplate = sheet.hide.bind(sheet5);
    });
});
