import {useState} from 'react';
import Marks from "./Marks";

function CourseForm(){
    let courses = [];
    
    const [courseName, setCourseName] = useState("");
    const [grade, setGrade] = useState("");
    const [courseList, setCourseList] = useState([]);
    const [counter,setCounter] = useState(1);

    const courseAdder = ()=>{
        let courseObj = {courseID: counter, courseName:courseName, grade:parseInt(grade)};
        courses = courseList;
        courses.push(courseObj);

        setCourseList(courses);
        setCounter(counter+1);
        setCourseName("");
        setGrade("");
    }

    return (
        <>
            <form>
                <input type="text" placeholder="Write the course name" value={courseName}
                onChange={(e) => setCourseName(e.target.value)}/> <br/>
                
                <input type="text" placeholder="Write the Grade" value={grade}
                onChange={(e) =>setGrade(e.target.value) }/> <br/>

                <button type="button" onClick={courseAdder}> Add </button>
            </form>

            <Marks courses = {courseList} />
        
        </>
    )

}
export default CourseForm;