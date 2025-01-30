import type { Metadata } from "next"
import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import ContactForm from "../components/ContactForm"
import ContactInfo from "../components/ContactInfo"

export const metadata: Metadata = {
  title: "Contact Us | University Admissions Portal",
  description: "Get in touch with our admissions team for any queries or support.",
}

export default function Contact() {
  return (
    <main className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      <Navbar />
      <div className="pt-24 pb-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 className="text-5xl font-bold text-center mb-4 text-gray-800">Contact Us</h1>
          <p className="text-xl text-center mb-12 text-gray-600 max-w-3xl mx-auto">
            Have questions? We're here to help. Reach out to our admissions team for support.
          </p>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-12">
            <ContactForm />
            <ContactInfo />
          </div>
        </div>
      </div>
      <Footer />
    </main>
  )
}

