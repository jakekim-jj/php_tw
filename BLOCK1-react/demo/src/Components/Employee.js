import {useState} from 'react';

function LevelDetect(props){
    if(props.year <= 2){
        return <h1>{props.name} is entry level</h1>
    }
    else if(props.year >2 && props.year <=5){
        return <h1>{props.name} is junior</h1>
    }
    else {
        return <h1>{props.name} is senior</h1>
    }
}

function AddEmp(props){
    return <li> Employee Name : {props.empList.name} Year : {props.empList.year}</li>;
}

function EmployeeDisplay(props){
    return(
        <>
            {props.emp_list.map((empList)=> <AddEmp key={empList.name} empList={empList}/>)}    
        </>
    )
}

function Employee(props){
    const [name, setName] = useState("");
    const [year, setYear] = useState("");
    const [empList, setEmpList] = useState([]);

    // const employees=[];
    let emp_list = [];
    
    const empAddr = () =>{
        let empObj = {name:name, year:year};
        emp_list = empList;
        emp_list.push(empObj);

        setEmpList(emp_list);
        setName("");
        setYear("");

    }

    return(
        <>
            {/* {employees.map((employees)=><LevelDetect name={employees.name} year={employees.year}/>)} */}
            <form>
                <input type="text" placeholder="write your name" value={name}
                onChange={(e) => setName(e.target.value)}/><br/>

                <input type="text" placeholder="write your year" value={year}
                onChange={(e) => setYear(e.target.value)}/><br/>

                <button type="button" onClick={empAddr}>submit</button>

                <LevelDetect name={name} year={year}/>
                <ul>
                    <EmployeeDisplay emp_list={empList}/>
                </ul>


            </form>
        </>
    )
}
export default Employee;
