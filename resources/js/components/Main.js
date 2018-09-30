import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Group from './Group';
import AddGroup from './AddGroup';

export default class Main extends Component {

    constructor() {

        super();

        this.state = {
            groups: [],
            currentGroup: null
        }

        this.handleAddGroup = this.handleAddGroup.bind(this)
    }

    componentDidMount() {
        fetch('/api/groups')
            .then(response => {
                return response.json();
            })
            .then(groups => {
                this.setState({ groups });
            });
    }

    renderGroups() {
        return this.state.groups.map(groups => {
            return (
                <li onClick={
                    () => this.handleClick(groups)} key={groups.id}>
                    { groups.nome }
                </li>
            );
        })
    }
    
    handleClick(groups) {
        this.setState({currentGroup:groups});
        // alert( groups.nome )
    }

    handleAddGroup(group) {
        fetch('api/groups/', {
            method: 'post',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },

            body: JSON.stringify(group)
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            this.setState((prevState) => ({
                groups: prevState.groups.concat(data),
                currentGroup: data
            }))
        })
    }

    render() {
        return (
            <div>
                <div>
                    <h3>Todos os Grupos</h3>
                    
                    <ul>
                        <AddGroup onAdd={ this.handleAddGroup } />
                        { this.renderGroups() }
                        <Group group={this.state.currentGroup} />
                    </ul>
                </div>
                
            </div>
        );
    }
}

if (document.getElementById('main')) {
    ReactDOM.render(<Main />, document.getElementById('main'));
}
