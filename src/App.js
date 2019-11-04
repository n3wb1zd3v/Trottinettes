import React, { Component } from 'react'

import './App.css'

class App extends Component {
  state = {
    title: "Trott'En Tête!",
  }

  render() {
    return (
      <div className="container-fluid d-flex flex-column my-5 align-items-center">
        <h1 className="my-5" >{this.state.title}</h1>
      </div>
    )
  }
}

export default App