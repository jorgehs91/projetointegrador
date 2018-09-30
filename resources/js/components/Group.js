import React, { Component } from 'react';

const Group = ({group}) => {

    if(!group) {
        return(<div>Não há grupos</div>)
    }

    return(
        <div>
            <h2> {group.nome} </h2>
            <p> {group.descricao} </p>
        </div>
    )
}

export default Group;