import { Calendar } from "lucide-react"

const events = [
  {
    title: "Open Day",
    date: "2023-07-15",
    location: "Main Campus",
  },
  {
    title: "Admissions Webinar",
    date: "2023-07-22",
    location: "Online",
  },
  {
    title: "Career Fair",
    date: "2023-08-05",
    location: "University Hall",
  },
]

const UpcomingEvents = () => {
  return (
    <section className="py-16 bg-white">
      <div className="container mx-auto px-4">
        <h2 className="text-3xl font-bold text-center mb-8">Upcoming Events</h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {events.map((event, index) => (
            <div key={index} className="bg-gray-100 rounded-lg p-6">
              <Calendar className="w-8 h-8 text-blue-600 mb-4" />
              <h3 className="text-xl font-semibold mb-2">{event.title}</h3>
              <p className="text-gray-600 mb-2">Date: {event.date}</p>
              <p className="text-gray-600 mb-4">Location: {event.location}</p>
              <button className="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
                Register Now
              </button>
            </div>
          ))}
        </div>
      </div>
    </section>
  )
}

export default UpcomingEvents

