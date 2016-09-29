            ///Comment box///

var Comment = React.createClass({
  rawMarkup: function() {
    var md = new Remarkable();
    var rawMarkup = md.render(this.props.children.toString());
    return { __html: rawMarkup };// chuyển dữ liệu sang HTML thô (Remarkable) -> bảo vệ khỏi tấn công xxs
  },

  render: function() {
    return (
      <div className="comment">
        <h2 className="commentAuthor">
         {this.props.author}
        </h2>
       <span dangerouslySetInnerHTML={this.rawMarkup()} />
      </div>
    );
  }
});


var CommentBox = React.createClass({
  loadCommentsFromServer: function() {
    //use ajax to call for server to get response
    $.ajax({
      url: this.props.url,
      dataType: 'json',
      cache: false,
      success: function(data) {
        //console.log(JSON.stringify(data));
        this.setState({data: data});
      }.bind(this),
      error: function(xhr, status, err) {
        console.error(this.props.url, status, err.toString());
      }.bind(this)
    });
  },

  handleCommentSubmit: function(comment) {
    // Our application is now feature complete but it feels slow to have to wait for the request 
    // to complete before your comment appears in the list. We can optimistically add this 
    // comment to the list to make the app feel faster.
     var comments = this.state.data;
    
     //comment.id = Date.now();
     var newComments = comments.concat([comment]);
     this.setState({data: newComments});
    // TODO: submit to the server and refresh the list
    $.ajax({
      url: this.props.url,
      dataType: 'json',
      type: 'POST',
      data: comment,
      success: function(data) {
        //console.log(JSON.stringify(data));
        this.setState({data: data});
        
      }.bind(this),
      error: function(xhr, status, err) {

        this.setState({data: comments}); 

        console.error(this.props.url, status, err.toString());
      }.bind(this)
    });
  },

  getInitialState: function() {
    return {data: []};
  },

  componentDidMount: function() {
    this.loadCommentsFromServer();
    //setInterval(this.loadCommentsFromServer, this.props.pollInterval);
  },

  

  render: function() {
    
    return (
    <div className="commentBox">
      <h1>Comments</h1>
      <CommentForm onCommentSubmit={this.handleCommentSubmit}/>
      <CommentList data={this.state.data}/>
    </div>
    );
  }
});



        ///commentlist///
var CommentList = React.createClass({
  render: function() {
    var commentNodes = this.props.data.map(function(comment) {
      //console.log('state = ' + JSON.stringify(comment));
      return (
        <Comment author={comment.author} key={comment.id}>
          {comment.text}
        </Comment>
      );
    });
    return (
      <div className="commentList">
        { commentNodes }
      </div>
    );
  }
});



          ///commentform
var CommentForm = React.createClass({
  getInitialState: function() {
    return {author: '', text: ''};
  },

  handleAuthorChange: function(e) {
    this.setState({author: e.target.value});
  },

  handleTextChange: function(e) {
    this.setState({text: e.target.value});
  },

  handleSubmit: function(e) {
    //Call preventDefault() on the event to prevent the browser's default action of submitting the form.
    e.preventDefault();
    var author = this.state.author.trim();
    var text = this.state.text.trim();
    if (!text || !author) {
      return;
    }
    this.props.onCommentSubmit({author: author, text: text});
    // TODO: send request to the server
    this.setState({author: '', text: ''});
  },

  render: function() {
    return (
      <form class="commentForm" onSubmit={this.handleSubmit}>
      <input
          type="text"
          placeholder="Your name"
          value={this.state.author}
          onChange={this.handleAuthorChange}
      />
      <input
          type="text"
          placeholder="Say something..."
          value={this.state.text}
          onChange={this.handleTextChange}
      />
      <input type="submit" value="Post" />
      </form>
    );
  }
}); 




ReactDOM.render(
//<CommentBox url="/api/comments" />,-->
<CommentBox url="http://localhost/pyrocms/seller/server/"/>,
document.getElementById('content')
); 
