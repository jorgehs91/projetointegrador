import React, { Component } from 'react'

export default class AddGroup extends Component {
    
    constructor(props){
        super(props)

        this.state = {
            newGroup: {
                nome: '',
                descricao: ''
            }            
        }

        this.handleSubmit = this.handleSubmit.bind(this)
        this.handleInput = this.handleInput.bind(this)        
    }    

    handleInput(key, e) {
        var state = Object.assign({}, this.state.newGroup)
        state[key] = e.target.value
        this.setState({ newGroup: state })
    }

    handleSubmit(e) {
        e.preventDefault()
        this.props.onAdd(this.state.newGroup)
    }

    render() {
        const divStyle = {

        }

        return(
            <div>
                <h2>Add novo grupo</h2>
                <div>
                    <form onSubmit={ this.handleSubmit }>
                        <label htmlFor="">Nome
                            <input type="text" onChange={ (e)=>this.handleInput('nome', e) }/>
                        </label>
                        <label htmlFor="">Descrição
                            <input type="text" onChange={ (e)=>this.handleInput('descricao', e) }/>
                        </label>
                        <input type="submit" value="Submit"/>
                    </form>
                </div>
            </div>
        )
    }
}