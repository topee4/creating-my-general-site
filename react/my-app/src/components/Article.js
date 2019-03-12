import React, { Component, PureComponent } from 'react'

class Article extends PureComponent {
    constructor(props) {
        super(props)
        this.state = {
            isOpen: props.defaultOpen,
            count: 0
        }
    }
    // shouldComponentUpdate(nextProps, nextState) {
    //     return this.state.isOpen !== nextState.isOpen
    // }
    componentWillMount() {
        console.log('---', 'mounting')
    }

    // componentWillReceiveProps(nextProps) {
    //     if (nextProps.defaultOpen !== this.props.defaultOpen) this.setState({
    //         isOpen: nextProps.defaultOpen
    //     })
    // }

    componentWillUpdate() {
        console.log('---', 'will update')
    }


    render() {
        const { article, isOpen, onButtonClick } = this.props;
        const body = isOpen && <section className="card-text">{article.text}</section>
        return (
            <div className="card mx-auto" style={{ width: '50%' }}>
                <div className="card-header">
                    <h2 onClick = {this.incrementCounter}>
                        {article.title}
                        clicked: {this.state.count}
                        <button onClick={onButtonClick} className="btn btn-primary btn-lg float-right">
                            {isOpen ? 'close' : 'open'}
                        </button>
                    </h2>
                </div>
                <div className="card-body">
                    {body}
                    <h6 className="sub-title text-muted">creation date: {(new Date(article.date)).toDateString()}</h6>
                </div>
            </div>
        )
    }

    incrementCounter = () => {
        this.setState({
            count: this.state.count +1
        })
    }
}



export default Article