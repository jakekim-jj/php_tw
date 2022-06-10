function List(props){

    return(
        <>
            <li>Employee name : {props.Name} and Experience is : {props.Year}</li>
        </>
    )
}

function StudentList(){
    const employees=[
        {id:1, Name : "Miguel", Year :"1"},
        {id:2, Name : "Jose", Year:"3"},
        {id:3, Name : "Taka", Year: "5"},
        {id:4, Name : "Jake", Year: "9"}
    ];

    return(
        <ul>
            {employees.map((employees)=><List Name={employees.Name} Year={employees.Year}/>)}
        </ul>
    )

}
export default StudentList;