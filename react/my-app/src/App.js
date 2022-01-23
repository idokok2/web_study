import React, { Component } from 'react';
import Subject from "./comppnents/Subject";
import TOC from "./comppnents/TOC";
import Content from "./comppnents/Content";

class App extends Component {
    constructor(props) {
        super(props);
        this.state = {
            subject: { title: 'web', sub: 'world wide web!' },
            contents: [
                { id: 1, title: "html", desc: "html desc" },
                { id: 2, title: "css", desc: "css desc" },
                { id: 3, title: "javascript", desc: "javascript desc" },

            ]
        }
    }
    render() {
        return (
            <div className='App'>
                <Subject
                    title={this.state.subject.title}
                    sub={this.state.subject.sub}>
                </Subject>
                <TOC
                    data={this.state.contents}></TOC>
                <Content></Content>
                <a href='/'>상위</a>
            </div>
        );
    }
}

export default App;
