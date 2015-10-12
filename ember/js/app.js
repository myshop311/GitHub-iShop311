App = Ember.Application.create();
 
App.Router.map(function() {
  this.route("about");
  this.route("collections");
 
  this.resource("exhibits", function(){
    this.resource("exhibit", { path: "/:exhibit_id"});
  });
  
  this.route("notes");
});

/*
 * COLLECTIONS CODE STARTS HERE
 */
  


// Collections Route
App.CollectionsRoute = Ember.Route.extend({
  model: function() {
    return [
      {
        title: "NYC Photography Collections",
        copy: "New York – often called New York City or the City of New York to distinguish it from the State of New York, of which it is a part – is the most populous city in the United States and the center of the New York metropolitan area, the premier gateway for legal immigration to the United States and one of the most populous urban agglomerations in the world.", 
        image: "images/collections/nyc-1.jpg"
      }, {
        title: "NYC Painting Collections",
        copy: "Situated on one of the world's largest natural harbors, New York City consists of five boroughs, each of which is a county of New York State.",
        image: "images/collections/nyc-2.jpg"
      }, {
        title: "NYC Sculpture Collections",
        copy: "New York City traces its roots to its 1624 founding as a trading post by colonists of the Dutch Republic and was named New Amsterdam in 1626. ",
        image: "images/collections/nyc-3.jpg"
      }
    ];
  }
});

// Customize the Collections component
App.SingleCollectionComponent = Ember.Component.extend({
  tagName: "article",
  classNames: ["collectionArticleClass cf"]
});

/*
 * CONTROLLERS CODE STARTS HERE
 */

// Route for all Exhibits
App.ExhibitsRoute = Ember.Route.extend({
  model: function() {
  return $.get("js/exhibits.json").then(function(data) {
   return data.exhibits;
    });
  }
});

// Route for a single Exhibit
App.ExhibitRoute = Ember.Route.extend({
  model: function(params) {
    return $.get("js/exhibits.json").then(function(data) {
      var modelId = params.exhibit_id - 1;
      data.exhibits.title = data.exhibits[modelId].title;
      data.exhibits.artist_name = data.exhibits[modelId].artist_name;
      data.exhibits.exhibit_info = data.exhibits[modelId].exhibit_info;
      data.exhibits.image = data.exhibits[modelId].image;
      return data.exhibits;
    });
  }
});

// Array controller...decorates all model data
App.ExhibitsController = Ember.ArrayController.extend({
  totalExhibits: function(){
    return this.get("model.length");
  }.property("@each")
});

// Object controller...decorates a single piece of model data
App.ExhibitController = Ember.ObjectController.extend({
  exhibitTitle: function(){
    return this.get("title") + " by " + this.get("artist_name");
  }.property("artist_name", "title")
});

/*
 * NOTES CODE STARTS HERE
 */

 App.Note = DS.Model.extend({
  copy: DS.attr()
});

App.NotesRoute = Ember.Route.extend({
  model: function() {
    return this.store.find("note");
  }
});

App.NotesController = Ember.ArrayController.extend({
  actions: {
    newNote: function() {
      var copy = this.get("newNote");
      if (!copy) {
        return false;
      }

      var note = this.store.createRecord("note", {
        copy: copy
      });

      this.set("newNote", "");
      note.save();
    }
  }
});

App.NoteController = Ember.ObjectController.extend({
  isEditing: false,
  actions: {
    editNote: function() {
      this.set("isEditing", true);
    },
    saveNewNote: function() {
      this.set("isEditing", false);
      
      if (!(this.get("model.copy"))) {
        this.send("deleteNote");
      } else {
        this.get("model").save();
      }
    },
     deleteNote: function() {
      this.get("model").deleteRecord();
      this.get("model").save();  
    }
  }
});

App.EditNote = Ember.TextArea.extend({
  attributeBindings: ["cols", "rows"],
  cols: 50,
  rows: 10
});

Ember.Handlebars.helper("update-note", App.EditNote);

App.ApplicationAdapter = DS.LSAdapter.extend({
  namespace: "nycNotes"
});